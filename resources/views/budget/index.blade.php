<x-app-layout>
    <div class="flex flex-col gap-10 max-w-2xl mx-auto py-4">
        <!-- Header Section -->
        <header class="text-center sm:text-left">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-text-label hover:text-primary transition-colors mb-6 group font-black text-[10px] uppercase tracking-widest bg-white/5 px-4 py-2 rounded-full border border-border">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                Kembali ke Dashboard
            </a>
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight text-white mb-2 italic">Atur Anggaran</h1>
            <p class="text-xs sm:text-sm text-text-label font-bold uppercase tracking-widest opacity-70 italic">Kelola limit pengeluaran kamu agar keuangan tetap sehat, {{ Auth::user()->name }}! ✨</p>
        </header>

        <!-- Main Form Card -->
        <div class="bg-card-bg p-8 sm:p-12 rounded-[3.5rem] border border-border shadow-2xl relative overflow-hidden group">
            <!-- Decorative Glow -->
            <div class="absolute -right-20 -bottom-20 w-60 h-60 bg-primary/5 rounded-full blur-[100px] group-hover:bg-primary/10 transition-all duration-1000"></div>
            
            <form action="{{ route('budget.store') }}" method="POST" class="flex flex-col gap-8 relative z-10">
                @csrf
                
                <!-- Nominal Budget -->
                <div class="flex flex-col gap-3">
                    <label for="amount" class="text-[10px] font-black uppercase tracking-[0.25em] text-text-label ml-4">Nominal Target (Rp)</label>
                    <div class="relative">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 flex items-center gap-2 pointer-events-none">
                            <span class="text-primary font-black italic">Rp</span>
                            <div class="w-px h-6 bg-border mx-1"></div>
                        </div>
                        <input type="number" name="amount" id="amount" placeholder="Contoh: 2000000" 
                               value="{{ old('amount', $budget->amount ?? '') }}" required
                               class="w-full bg-black/40 border-2 border-border rounded-[2rem] pl-20 pr-8 py-5 text-white font-black placeholder:text-text-label/20 focus:border-primary focus:ring-8 focus:ring-primary/5 transition-all outline-none text-xl tracking-tighter">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Start Date -->
                    <div class="flex flex-col gap-3">
                        <label for="start_date" class="text-[10px] font-black uppercase tracking-[0.25em] text-text-label ml-4">Mulai Tanggal</label>
                        <input type="date" name="start_date" id="start_date" 
                               value="{{ old('start_date', $budget->start_date ?? now()->format('Y-m-d')) }}" required
                               class="w-full bg-black/40 border-2 border-border rounded-3xl px-8 py-5 text-white font-bold focus:border-primary focus:ring-8 focus:ring-primary/5 transition-all outline-none text-base">
                    </div>

                    <!-- End Date -->
                    <div class="flex flex-col gap-3">
                        <label for="end_date" class="text-[10px] font-black uppercase tracking-[0.25em] text-text-label ml-4">Hingga Tanggal</label>
                        <input type="date" name="end_date" id="end_date" 
                               value="{{ old('end_date', $budget->end_date ?? now()->addDays(30)->format('Y-m-d')) }}" required
                               class="w-full bg-black/40 border-2 border-border rounded-3xl px-8 py-5 text-white font-bold focus:border-primary focus:ring-8 focus:ring-primary/5 transition-all outline-none text-base">
                    </div>
                </div>

                <div class="p-6 bg-white/5 rounded-3xl border border-dashed border-border mt-2">
                    <p class="text-xs text-text-label font-bold leading-relaxed italic text-center">
                        💡 Tips: Tetapkan budget yang masuk akal biar kamu gak "kaget" di akhir bulan. Konsistensi adalah kunci, {{ Auth::user()->name }}! 🥐
                    </p>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="mt-4 w-full bg-primary text-black font-black uppercase tracking-[0.3em] text-sm py-6 rounded-3xl shadow-2xl shadow-primary/30 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-4 group/btn">
                    Simpan Anggaran
                    <svg class="w-5 h-5 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="3.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                </button>
            </form>
        </div>

        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" class="fixed inset-0 z-[2000] flex items-center justify-center p-6 bg-black/80 backdrop-blur-sm">
                <div class="bg-card-bg w-full max-w-sm p-10 rounded-[3rem] border border-border shadow-2xl text-center flex flex-col items-center">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6 border-2 border-primary animate-pulse">
                        <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" stroke-width="4" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h2 class="text-2xl font-black text-white mb-2 tracking-tight uppercase">Budget Diatur!</h2>
                    <p class="text-sm text-text-label font-bold uppercase tracking-widest leading-loose mb-8 italic">{{ session('success') }}</p>
                    <button @click="show = false" class="w-full py-4 bg-primary text-black font-black uppercase tracking-widest text-xs rounded-2xl shadow-xl shadow-primary/20 hover:scale-105 active:scale-95 transition-all">Selesai</button>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-500 p-6 rounded-3xl font-bold text-xs uppercase tracking-widest flex flex-col gap-2 shadow-lg">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center gap-2 italic">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>