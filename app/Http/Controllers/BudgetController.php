<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index() {
        // Ambil budget user untuk bulan & tahun ini (Format: April-2026)
        $currentMonth = now()->format('F-Y');
        $budget = Auth::user()->budgets()->where('month_year', $currentMonth)->first();

        return view('budget.index', compact('budget', 'currentMonth'));
    }

    public function store(Request $request) {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
    
        Auth::user()->budgets()->updateOrCreate(
            ['month_year' => now()->format('F-Y')],
            [
                'amount' => $request->amount,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'user_id' => Auth::id()
            ]
        );
    
        return redirect()->back()->with('success', 'Target durasi hemat dipasang! ⏳');
    }
}