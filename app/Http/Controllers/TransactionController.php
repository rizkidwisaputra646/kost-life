<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller {
    public function index() {
        $user = Auth::user();
        
        // 1. Data Budget & Periode aktif
        $budget = $user->budgets()->latest()->first();
        $daily_quota = 0;
        $days_left = 0;
        $period_income = 0;
        $period_expense = 0;
        $budget_limit = $budget->amount ?? 0;
        
        if ($budget && $budget->start_date && $budget->end_date) {
            $start = \Carbon\Carbon::parse($budget->start_date)->startOfDay();
            $end = \Carbon\Carbon::parse($budget->end_date)->endOfday();
            $today = now()->startOfDay();
        
            // Pemasukan & Pengeluaran cuma di dalam tanggal budget
            $period_income = $user->transactions()
                ->where('type', 'income')
                ->whereBetween('created_at', [$start, $end])
                ->sum('amount');

            $period_expense = $user->transactions()
                ->where('type', 'expense')
                ->whereBetween('created_at', [$start, $end])
                ->sum('amount');

            $days_left = max(0, (int) ceil($today->diffInDays($end, false)));
            $balance = ($budget_limit + $period_income) - $period_expense;

            if ($days_left > 0) {
                $daily_quota = $balance / $days_left;
            } else {
                $days_left = 0;
                $daily_quota = $balance;
            }
        } else {
            $balance = $user->transactions()->where('type', 'income')->sum('amount') - $user->transactions()->where('type', 'expense')->sum('amount');
        }

        // 2. Data Chart (7 Hari Terakhir)
        $chart_data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $day_name = $date->format('D'); // Mon, Tue, etc.
            $day_expense = $user->transactions()
                ->where('type', 'expense')
                ->whereDate('created_at', $date->toDateString())
                ->sum('amount');
            
            $chart_data[] = [
                'day' => substr($day_name, 0, 1), // S, M, T...
                'amount' => $day_expense,
                'label' => number_format($day_expense / 1000, 0) . 'k'
            ];
        }

        // 3. Riwayat Transaksi (Limit 5 untuk Dashboard)
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->limit(5)->get();
    
        // 4. Kirim data ke dashboard
        return view('dashboard', compact(
            'transactions', 
            'balance', 
            'daily_quota', 
            'days_left',
            'budget_limit',
            'period_income',
            'period_expense',
            'chart_data'
        ));
    }

    public function exportPdf() {
        $user = Auth::user();
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get();
        $total_income = $user->transactions()->where('type', 'income')->sum('amount');
        $total_expense = $user->transactions()->where('type', 'expense')->sum('amount');
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('transactions.pdf', [
            'transactions' => $transactions,
            'user' => $user,
            'total_income' => $total_income,
            'total_expense' => $total_expense,
            'balance' => $total_income - $total_expense
        ]);

        return $pdf->download('Kost_Life_Report_' . now()->format('Y-m-d') . '.pdf');
    }

    public function history() {
        $user = Auth::user();
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get();
        $total_income = $user->transactions()->where('type', 'income')->sum('amount');
        $total_expense = $user->transactions()->where('type', 'expense')->sum('amount');
        $balance = $total_income - $total_expense;

        return view('transactions.index', compact('transactions', 'balance', 'total_income', 'total_expense'));
    }

    public function create() {
        return view('transactions.create');
    }

    public function store(Request $request) {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:income,expense',
        ]);

        Auth::user()->transactions()->create([
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->type == 'income' ? 'Pemasukan' : 'Pengeluaran',
        ]);

        return redirect()->route('dashboard')->with('success', 'Tercatat, Ong!');
    }

    // Menghapus Transaksi
    public function destroy(Transaction $transaction)
    {
        // Pastikan cuma yang punya transaksi yang bisa hapus
        if ($transaction->user_id !== Auth::id()) {
            return back()->with('error', 'Gak boleh kepo transaksi orang lain, Ong!');
        }
    
        $transaction->delete();
        return redirect()->route('dashboard')->with('success', 'Transaksi berhasil dihapus!');
    }
    
    // Fungsi Update (Kalau mau edit nominal/deskripsi)
    public function update(Request $request, Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            return back()->with('error', 'Akses ditolak!');
        }
    
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:income,expense',
        ]);
    
        $transaction->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'type' => $request->type,
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Data jajan berhasil diupdate!');
    }
}