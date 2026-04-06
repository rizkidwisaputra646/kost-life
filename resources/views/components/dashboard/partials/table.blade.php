<div class="bg-gray-900 rounded-[2.5rem] overflow-hidden shadow-2xl">
    <div class="p-8 flex justify-between items-center border-b border-gray-800 bg-gray-900/50">
        <h3 class="text-white font-black italic uppercase tracking-tighter">Alur Kas (Masuk & Keluar)</h3>
        <div class="flex gap-4 italic font-bold text-[10px] uppercase">
            <span class="text-emerald-400">In: +{{ number_format($balance + $total_expense, 0, ',', '.') }}</span>
            <span class="text-red-400">Out: -{{ number_format($total_expense, 0, ',', '.') }}</span>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-[10px] font-black uppercase tracking-widest text-gray-500 border-b border-gray-800">
                    <th class="px-8 py-4">Kategori</th>
                    <th class="px-8 py-4">Keterangan</th>
                    <th class="px-8 py-4">Tanggal</th>
                    <th class="px-8 py-4 text-right">Nominal</th>
                    <th class="px-8 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse($transactions as $trx)
                <tr class="group hover:bg-white/5 transition-all font-bold italic">
                    <td class="px-8 py-6 text-xs {{ $trx->type == 'income' ? 'text-emerald-400' : 'text-red-400' }} uppercase">
                        {{ $trx->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                    </td>
                    <td class="px-8 py-6 text-gray-300 text-sm">{{ $trx->description }}</td>
                    <td class="px-8 py-6 text-gray-500 text-xs text-nowrap">{{ $trx->created_at->format('d M Y') }}</td>
                    <td class="px-8 py-6 text-right text-sm {{ $trx->type == 'income' ? 'text-emerald-400' : 'text-red-400' }}">
                        {{ $trx->type == 'income' ? '+' : '-' }} Rp {{ number_format($trx->amount, 0, ',', '.') }}
                    </td>
                    <td class="px-8 py-6 text-center">
                        <form action="{{ route('transactions.destroy', $trx->id) }}" method="POST" class="delete-confirm">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-gray-600 hover:text-red-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center text-gray-600 uppercase font-black italic">Belum ada transaksi, {{ Auth::user()->name }}! 🍕</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="bg-gray-950 py-6 text-center">
        <span class="text-[9px] font-black uppercase tracking-[0.3em] text-gray-700 underline decoration-emerald-500/50">TEKNOLOGI INFORMASI • UTI 2026 • PKM-PI</span>
    </div>
</div>