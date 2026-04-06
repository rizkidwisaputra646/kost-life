<x-app-layout>
    <div class="flex flex-col gap-8">
        <!-- Header -->
        <header class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-text-label hover:text-primary transition-colors mb-4 group font-black text-[10px] uppercase tracking-widest">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                    Kembali ke Dashboard
                </a>
                <h1 class="text-3xl font-black tracking-tight text-white uppercase italic">Riwayat <span class="text-primary not-italic underline decoration-4 underline-offset-8">Transaksi</span></h1>
                <p class="text-xs text-text-label font-bold uppercase tracking-widest mt-2 italic opacity-70">Daftar semua pemasukan dan pengeluaran kamu</p>
            </div>
            <div class="flex flex-wrap gap-3 w-full md:w-auto">
                <a href="{{ route('transactions.export') }}" class="flex-1 md:flex-none bg-white/5 text-white font-black uppercase tracking-[0.2em] text-[10px] px-8 py-4 rounded-2xl border border-border hover:bg-white/10 hover:border-primary/50 transition-all flex items-center justify-center gap-3 shadow-xl">
                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Export PDF
                </a>
                <a href="{{ route('transactions.create') }}" class="flex-1 md:flex-none bg-primary text-black font-black uppercase tracking-[0.2em] text-[10px] px-8 py-4 rounded-2xl shadow-xl shadow-primary/20 hover:scale-[1.05] active:scale-[0.95] transition-all flex items-center justify-center gap-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                    Tambah Baru
                </a>
            </div>
        </header>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-card-bg p-8 rounded-[2.5rem] border border-border shadow-lg flex flex-col gap-2 group hover:border-primary/30 transition-all">
                <span class="text-[10px] font-black uppercase tracking-[0.25em] text-text-label group-hover:text-primary transition-colors">Saldo Budget (Isi Dompet)</span>
                <span class="text-3xl font-black tracking-tighter text-white">Rp {{ number_format($balance, 0, ',', '.') }}</span>
            </div>
            <div class="bg-card-bg p-8 rounded-[2.5rem] border border-border shadow-lg flex flex-col gap-2 group hover:border-emerald-500/30 transition-all">
                <span class="text-[10px] font-black uppercase tracking-[0.25em] text-primary">Total Pemasukan</span>
                <span class="text-3xl font-black tracking-tighter text-primary">Rp {{ number_format($total_income, 0, ',', '.') }}</span>
            </div>
            <div class="bg-card-bg p-8 rounded-[2.5rem] border border-border shadow-lg flex flex-col gap-2 group hover:border-red-500/30 transition-all">
                <span class="text-[10px] font-black uppercase tracking-[0.25em] text-red-400">Total Pengeluaran</span>
                <span class="text-3xl font-black tracking-tighter text-red-400">Rp {{ number_format($total_expense, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Transaction List -->
        <div class="flex flex-col gap-5">
            <div class="flex items-center justify-between px-4 mb-2">
                <h3 class="text-[10px] font-black text-text-label uppercase tracking-[0.25em]">Detail Transaksi</h3>
                <span class="text-[10px] font-black text-text-label uppercase tracking-widest opacity-50">{{ $transactions->count() }} Total Data</span>
            </div>

            <div class="grid grid-cols-1 gap-4">
                @foreach($transactions as $tx)
                    <div class="flex items-center p-6 bg-card-bg rounded-[2.5rem] border border-border hover:border-primary/40 transition-all hover:scale-[1.01] active:scale-[0.99] group shadow-lg">
                        <div class="w-14 h-14 rounded-2xl bg-black/40 flex items-center justify-center mr-6 group-hover:bg-primary/10 border border-border group-hover:border-primary/30 transition-all shadow-inner overflow-hidden relative">
                            @if($tx->type == 'income')
                                <svg class="w-7 h-7 text-primary relative z-10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                            @else
                                <svg class="w-7 h-7 text-red-500 relative z-10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="block font-black text-base md:text-lg tracking-tight mb-1 text-white truncate group-hover:text-primary transition-colors">{{ $tx->description }}</span>
                            <div class="flex items-center gap-2 overflow-hidden">
                                <span class="text-[10px] uppercase font-black px-3 py-1 bg-white/5 rounded-lg text-text-label/80 tracking-tighter whitespace-nowrap border border-border">{{ $tx->created_at->format('d M Y, H:i') }}</span>
                                <span class="text-[10px] text-text-label/30 font-bold hidden sm:inline">•</span>
                                <span class="text-[10px] text-text-label/60 font-black italic hidden sm:inline">{{ $tx->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row items-end sm:items-center gap-6 pl-4">
                            <span class="font-black text-lg md:text-2xl tracking-tighter {{ $tx->type == 'income' ? 'text-primary' : 'text-red-500' }}">
                                {{ $tx->type == 'income' ? '+' : '-' }}Rp{{ number_format($tx->amount, 0, ',', '.') }}
                            </span>
                                                       <!-- Delete Button -->
                            <form action="{{ route('transactions.destroy', $tx) }}" method="POST" class="delete-confirm">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-4 bg-red-500/5 hover:bg-red-500 border border-red-500/10 hover:border-red-600 text-red-500 hover:text-black rounded-2xl transition-all shadow-xl group/del">
                                    <svg class="w-5 h-5 transform group-hover/del:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

                @if($transactions->isEmpty())
                    <div class="p-20 text-center bg-card-bg rounded-[3rem] border-2 border-dashed border-border group hover:border-primary/20 transition-all duration-500">
                        <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-8 group-hover:scale-110 group-hover:bg-primary/5 transition-all duration-500 text-white">
                            <svg class="w-12 h-12 text-text-label/40 group-hover:text-primary/40 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-lg font-black text-text-label tracking-tight uppercase">Wah, masih kosong riwayatnya, {{ Auth::user()->name }}! 🥐</p>
                        <p class="text-sm text-text-label/50 mt-2 font-bold italic">Mulai catat transaksi pertamamu hari ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
;
</script>