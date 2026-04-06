<x-app-layout>
    <div class="flex flex-col gap-8">
        <!-- Welcome Header -->
        <header>
            <p class="text-text-label text-xs uppercase font-bold tracking-[0.2em] mb-1">Selamat {{ now()->hour < 12 ? 'pagi' : (now()->hour < 18 ? 'siang' : 'malam') }}, {{ Auth::user()->name }} 👋</p>
            <h1 class="text-3xl font-black tracking-tight text-white uppercase italic">Dashboard <span class="text-primary not-italic underline decoration-4 underline-offset-8">Overview</span></h1>
        </header>

        <!-- Dashboard Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Column: Balance & Budget -->
            <div class="lg:col-span-4 flex flex-col gap-6 w-full">
                <!-- Unified Budget Balance Card -->
                <div class="bg-gradient-to-br from-primary to-primary-dark p-8 rounded-[2.5rem] shadow-2xl shadow-primary/20 border-none relative overflow-hidden group text-white">
                    <div class="absolute -right-6 -top-6 w-32 h-32 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-all duration-1000"></div>
                    <span class="text-[10px] font-black uppercase tracking-[0.25em] opacity-80 text-white">Saldo Budget (Isi Dompet)</span>
                    <h2 class="text-4xl font-black my-6 tracking-tighter text-white">Rp {{ number_format($balance, 0, ',', '.') }}</h2>
                    <div class="flex items-center gap-2 text-xs font-bold opacity-90 italic text-white/90 bg-black/10 w-fit px-4 py-2 rounded-full backdrop-blur-md">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Estimasi Jatah: Rp {{ number_format($daily_quota, 0, ',', '.') }} / hari
                    </div>
                </div>

                <!-- Budget Progress Card -->
                <div class="bg-card-bg p-8 rounded-[2.5rem] border border-border shadow-xl">
                    <div class="flex justify-between items-end mb-6">
                        <h3 class="font-black text-lg tracking-tight">Status Periode</h3>
                        <div class="text-right">
                            <span class="text-[10px] font-black px-4 py-1.5 bg-primary/10 text-primary rounded-full border border-primary/20 uppercase tracking-widest">{{ $days_left }} Hari Lagi</span>
                        </div>
                    </div>
                    @php
                        $percentage = ($budget_limit + $period_income) > 0 ? min(100, ($period_expense / ($budget_limit + $period_income)) * 100) : 0;
                        $remaining_percentage = 100 - $percentage;
                    @endphp
                    <div class="w-full h-4 bg-white/5 rounded-full overflow-hidden border border-border p-1">
                        <div class="h-full bg-primary rounded-full transition-all duration-1000 ease-out shadow-[0_0_15px_rgba(16,185,129,0.4)]" style="width: {{ $remaining_percentage }}%"></div>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-[10px] font-black text-text-label uppercase tracking-widest italic">Pemasukan (+)</span>
                            <span class="text-xs font-black text-primary">Rp {{ number_format($period_income, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex flex-col items-end gap-1">
                            <span class="text-[10px] font-black text-text-label uppercase tracking-widest italic">Pengeluaran (-)</span>
                            <span class="text-xs font-black text-red-500">Rp {{ number_format($period_expense, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-border flex justify-between items-center">
                         <span class="text-[10px] font-black text-text-label uppercase tracking-widest italic">Budget Awal</span>
                         <span class="text-xs font-black text-white/60 text-right">Rp {{ number_format($budget_limit, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Stats & Recent Transactions -->
            <div class="lg:col-span-8 flex flex-col gap-6 w-full">
                
                <!-- Financial Charts (REAL-TIME) -->
                <div class="bg-card-bg p-8 rounded-[2.5rem] border border-border shadow-xl group">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
                        <div>
                            <h3 class="font-black text-lg tracking-tight">Analisis Pengeluaran</h3>
                            <p class="text-[10px] text-text-label font-bold uppercase tracking-[0.2em] mt-1 italic">Real-time 7 Hari Terakhir</p>
                        </div>
                    </div>
                    
                    @php
                        $max_amount = collect($chart_data)->max('amount') ?: 1;
                    @endphp

                    <div class="flex items-end justify-between h-48 gap-3 sm:gap-4 px-2">
                        @foreach($chart_data as $index => $data)
                            @php 
                                $h = ($data['amount'] / $max_amount) * 100;
                                if($h < 10 && $data['amount'] > 0) $h = 10; // Min height for visibility if > 0
                            @endphp
                            <div class="flex-1 flex flex-col items-center gap-4 group/bar h-full justify-end">
                                <div class="relative w-full bg-white/5 rounded-t-2xl transition-all duration-700 ease-out hover:bg-primary group-hover/bar:shadow-[0_0_30px_rgba(16,185,129,0.3)] {{ $index == 6 ? 'bg-primary/40' : '' }} overflow-visible" style="height: {{ $h }}%">
                                    <div class="absolute -top-14 left-1/2 -translate-x-1/2 bg-black border-2 border-primary/50 px-3 py-2 rounded-xl text-[10px] font-black text-primary opacity-0 group-hover/bar:opacity-100 transition-all duration-300 transform translate-y-3 group-hover/bar:translate-y-0 shadow-2xl pointer-events-none whitespace-nowrap z-20">
                                        Rp {{ number_format($data['amount'], 0, ',', '.') }}
                                        <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-4 h-4 bg-black border-r-2 border-b-2 border-primary/50 rotate-45"></div>
                                    </div>
                                    @if($data['amount'] > 0)
                                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[9px] font-black text-text-label/40 group-hover/bar:opacity-0 transition-opacity">
                                            {{ $data['label'] }}
                                        </div>
                                    @endif
                                </div>
                                <span class="text-[10px] font-black {{ $index == 6 ? 'text-primary' : 'text-text-label/60' }} group-hover/bar:text-primary transition-colors tracking-tighter">{{ $data['day'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Transactions -->
                <section class="flex flex-col gap-5">
                    <div class="flex justify-between items-center px-4 md:px-0">
                        <h3 class="font-black text-xs uppercase tracking-[0.25em] text-text-label/80">Riwayat Terakhir</h3>
                        <a href="{{ route('transactions.index') }}" class="text-[10px] font-black text-primary hover:bg-primary hover:text-black transition-all uppercase tracking-widest bg-primary/5 px-6 py-2.5 rounded-full border border-primary/20">Lihat Semua</a>
                    </div>

                    <div class="flex flex-col gap-3">
                        @foreach($transactions as $tx)
                            <div class="flex items-center p-5 bg-card-bg rounded-[2rem] border border-border hover:border-primary/40 transition-all hover:scale-[1.02] active:scale-[0.98] group shadow-lg">
                                <div class="w-14 h-14 rounded-2xl bg-black/40 flex items-center justify-center mr-5 group-hover:bg-primary/10 border border-border group-hover:border-primary/30 transition-all shadow-inner overflow-hidden relative">
                                    @if($tx->type == 'income')
                                        <svg class="w-6 h-6 text-primary relative z-10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
                                    @else
                                        <svg class="w-6 h-6 text-red-500 relative z-10" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <span class="block font-black text-sm md:text-base tracking-tight mb-1 text-white truncate group-hover:text-primary transition-colors">{{ $tx->description }}</span>
                                    <div class="flex items-center gap-2 overflow-hidden">
                                        <span class="text-[10px] uppercase font-black px-2 py-0.5 bg-white/5 rounded text-text-label/80 tracking-tighter whitespace-nowrap">{{ $tx->created_at->format('d M, H:i') }}</span>
                                        <span class="text-[10px] text-text-label/30 font-bold hidden sm:inline">•</span>
                                        <span class="text-[10px] text-text-label/60 font-black italic hidden sm:inline">{{ $tx->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="text-right pl-4">
                                    <span class="font-black text-base md:text-xl tracking-tighter {{ $tx->type == 'income' ? 'text-primary' : 'text-red-500' }}">
                                        {{ $tx->type == 'income' ? '+' : '-' }}Rp{{ number_format($tx->amount, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        @endforeach

                        @if($transactions->isEmpty())
                            <div class="p-20 text-center bg-card-bg rounded-[3rem] border-2 border-dashed border-border group hover:border-primary/20 transition-all duration-500">
                                <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-primary/5 transition-all duration-500 text-white">
                                    <svg class="w-10 h-10 text-text-label/40 group-hover:text-primary/40 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <p class="text-sm font-black text-text-label tracking-tight uppercase">Belum ada transaksi, {{ Auth::user()->name }}! ✨</p>
                                <p class="text-xs text-text-label/50 mt-2 font-bold italic">Mulai catat pengeluaranmu sekarang</p>
                                <a href="{{ route('transactions.create') }}" class="inline-flex items-center gap-2 mt-8 px-10 py-4 bg-primary text-black font-black uppercase text-[10px] tracking-[0.2em] rounded-2xl shadow-2xl shadow-primary/30 hover:scale-105 active:scale-95 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                                    Catat Sekarang
                                </a>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>