<x-app-layout>
    <div class="flex flex-col gap-8 max-w-2xl mx-auto">
        <!-- Header -->
        <header>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-text-label hover:text-primary transition-colors mb-4 group font-black text-[10px] uppercase tracking-widest">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                Kembali ke Dashboard
            </a>
            <h1 class="text-3xl font-black tracking-tight text-white">Catat Transaksi</h1>
            <p class="text-xs text-text-label font-bold uppercase tracking-widest mt-2 italic">Tambahkan pengeluaran atau pemasukan baru</p>
        </header>

        <!-- Form Card -->
        <div class="bg-card-bg p-8 md:p-12 rounded-[3rem] border border-border shadow-2xl relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
            
            <form action="{{ route('transactions.store') }}" method="POST" class="flex flex-col gap-8 relative z-10">
                @csrf
                
                <!-- Type Selection -->
                <div class="flex flex-col gap-4">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2">Jenis Transaksi</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="cursor-pointer group">
                            <input type="radio" name="type" value="expense" class="hidden peer" checked>
                            <div class="flex flex-col items-center gap-3 p-6 rounded-3xl border-2 border-border bg-black/20 peer-checked:border-red-500 peer-checked:bg-red-500/5 transition-all text-text-label peer-checked:text-red-500">
                                <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center border border-border group-hover:border-red-500/30 peer-checked:border-red-500/30 shadow-inner">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                                </div>
                                <span class="font-black uppercase tracking-tighter text-xs">Pengeluaran</span>
                            </div>
                        </label>
                        <label class="cursor-pointer group">
                            <input type="radio" name="type" value="income" class="hidden peer">
                            <div class="flex flex-col items-center gap-3 p-6 rounded-3xl border-2 border-border bg-black/20 peer-checked:border-primary peer-checked:bg-primary/5 transition-all text-text-label peer-checked:text-primary">
                                <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center border border-border group-hover:border-primary/30 peer-checked:border-primary/30 shadow-inner">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                                </div>
                                <span class="font-black uppercase tracking-tighter text-xs">Pemasukan</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Input Fields -->
                <div class="flex flex-col gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="description" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2">Keterangan / Catatan</label>
                        <input type="text" name="description" id="description" placeholder="Beli Nasi Goreng, Gaji, dll..." required
                               class="w-full bg-black/40 border-2 border-border rounded-2xl px-6 py-4 text-white font-bold placeholder:text-text-label/30 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="amount" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2">Nominal (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-text-label/50 font-black italic">Rp</span>
                            <input type="number" name="amount" id="amount" placeholder="0" required
                                   class="w-full bg-black/40 border-2 border-border rounded-2xl pl-14 pr-6 py-4 text-white font-black placeholder:text-text-label/30 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-xl tracking-tight">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="mt-4 w-full bg-primary text-black font-black uppercase tracking-[0.25em] text-sm py-5 rounded-2xl shadow-2xl shadow-primary/30 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                    Simpan Transaksi
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                </button>
            </form>
        </div>

        <!-- Success Message (if any) -->
        @if(session('success'))
            <div class="bg-primary/10 border border-primary/20 text-primary p-6 rounded-3xl font-black text-xs uppercase tracking-widest text-center shadow-lg">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-app-layout>
