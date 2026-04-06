<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selamat Datang di Kost-Life | Atur Cuan Jadi Lebih Santuy</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Inter', sans-serif; background-color: #000; color: #fff; overflow-x: hidden; }
            .hero-gradient { background: radial-gradient(circle at 50% 50%, rgba(16, 185, 129, 0.15) 0%, rgba(0, 0, 0, 0) 50%); }
            .glass-nav { background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-bottom: 1px solid rgba(255, 255, 255, 0.05); }
        </style>
    </head>
    <body class="antialiased">
        <!-- Navigation -->
        <nav class="glass-nav sticky top-0 z-[100] w-full">
            <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 text-2xl font-black text-white tracking-tighter group">
                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="text-primary" stroke-width="3.5">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>
                    </svg>
                    Kost-Life
                </a>

                <!-- Auth Links -->
                <div class="flex items-center gap-4 sm:gap-6 text-white font-black text-xs uppercase tracking-widest italic">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-primary text-black rounded-xl hover:scale-105 transition-all shadow-xl shadow-primary/20">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="hover:text-primary transition-all hidden sm:block">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-8 py-3 bg-primary text-black rounded-xl hover:scale-105 transition-all shadow-xl shadow-primary/20">Sign Up</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="relative pt-20 pb-32">
            <!-- Glow Effect -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[1000px] hero-gradient pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-6 text-center relative z-10 flex flex-col items-center">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 border border-primary/20 rounded-full mb-8">
                    <span class="w-2 h-2 bg-primary rounded-full animate-pulse shadow-[0_0_8px_rgba(16,185,129,0.8)]"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-primary italic">Atur Cuan Lebih Santuy 🥐</span>
                </div>

                <!-- Headline -->
                <h1 class="text-5xl md:text-8xl font-black text-white tracking-tight leading-[0.9] mb-8">
                    Catat Jajanmu,<br>
                    <span class="text-primary italic underline decoration-[10px] underline-offset-8">Pantau Budgetmu.</span>
                </h1>

                <!-- Sub-headline -->
                <p class="max-w-2xl text-lg md:text-xl text-slate-400 font-medium mb-12 leading-relaxed">
                    Sistem keuangan cerdas untuk anak kost modern. Atur anggaran harian, pantau pengeluaran real-time, dan ekspor laporan PDF cuma dengan satu klik.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-5">
                    <a href="{{ route('register') }}" class="px-12 py-5 bg-primary text-black font-black uppercase tracking-[0.2em] text-sm rounded-2xl shadow-2xl shadow-primary/30 hover:scale-[1.05] active:scale-[0.95] transition-all">
                        Mulai Sekarang
                    </a>
                    <a href="#features" class="px-12 py-5 bg-white/5 border border-white/10 text-white font-black uppercase tracking-[0.2em] text-sm rounded-2xl hover:bg-white/10 transition-all">
                        Pelajari Fitur
                    </a>
                </div>

                <!-- Dashboard Preview Label -->
                <div class="mt-24 mb-6 flex flex-col items-center">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-primary italic border border-primary/20 px-4 py-2 rounded-full bg-primary/5">
                        Tampilan Dashboard
                    </span>
                </div>

                <!-- Dashboard Preview Mockup (High Fidelity) -->
                <div class="relative w-full max-w-5xl mx-auto group">
                    <div class="absolute -inset-4 bg-primary/10 rounded-[3rem] blur-3xl opacity-50 group-hover:opacity-100 transition-all duration-1000"></div>
                    <div class="relative bg-card-bg border border-white/10 rounded-[2.5rem] overflow-hidden shadow-2xl">
                        <!-- Header Mockup -->
                        <div class="h-12 bg-black/40 border-b border-white/5 flex items-center px-6 justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-500/30"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500/30"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/30"></div>
                                <div class="ml-4 h-5 w-48 bg-white/5 rounded-full flex items-center px-3">
                                    <div class="w-3 h-3 bg-primary/40 rounded-full mr-2"></div>
                                    <div class="h-1.5 w-24 bg-white/10 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-20 h-4 bg-white/5 rounded-full"></div>
                                <div class="w-8 h-8 rounded-full bg-primary/20"></div>
                            </div>
                        </div>
                        
                        <!-- Content Mockup -->
                        <div class="p-8 md:p-12 text-left">
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
                                <!-- Left Column Mockup -->
                                <div class="md:col-span-4 flex flex-col gap-6">
                                    <div class="bg-primary p-6 rounded-3xl text-black">
                                        <p class="text-[10px] font-black uppercase tracking-widest opacity-60">Sisa Budget</p>
                                        <p class="text-2xl font-black mt-2 tracking-tight">Rp 2.450.000</p>
                                        <div class="mt-4 h-1 w-full bg-black/10 rounded-full overflow-hidden">
                                            <div class="h-full bg-black/40 w-3/4"></div>
                                        </div>
                                    </div>
                                    <div class="bg-white/5 p-6 rounded-3xl border border-white/5">
                                        <p class="text-[10px] font-black uppercase tracking-widest text-text-label">Pengeluaran</p>
                                        <p class="text-xl font-black mt-1 text-white">Rp 550.000</p>
                                    </div>
                                </div>
                                <!-- Right Column Mockup -->
                                <div class="md:col-span-8 bg-white/5 rounded-[2rem] border border-white/5 p-8 flex flex-col justify-between">
                                    <div class="flex justify-between items-start mb-8">
                                        <div>
                                            <p class="text-[10px] font-black uppercase tracking-widest text-primary">Statistik Mingguan</p>
                                            <p class="text-lg font-black text-white mt-1">Analisis Jajan</p>
                                        </div>
                                        <div class="px-3 py-1 bg-primary/10 rounded-full border border-primary/20 text-[9px] font-black text-primary">REAL-TIME</div>
                                    </div>
                                    <!-- Bars -->
                                    <div class="flex items-end justify-between h-32 gap-3">
                                        <div class="flex-1 bg-white/10 rounded-t-lg" style="height: 40%"></div>
                                        <div class="flex-1 bg-white/10 rounded-t-lg" style="height: 65%"></div>
                                        <div class="flex-1 bg-white/10 rounded-t-lg" style="height: 25%"></div>
                                        <div class="flex-1 bg-primary rounded-t-lg shadow-[0_0_20px_rgba(16,185,129,0.3)]" style="height: 85%"></div>
                                        <div class="flex-1 bg-white/10 rounded-t-lg" style="height: 45%"></div>
                                        <div class="flex-1 bg-white/10 rounded-t-lg" style="height: 30%"></div>
                                        <div class="flex-1 bg-white/10 rounded-t-lg" style="height: 55%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Features Section -->
        <section id="features" class="py-32 bg-black relative border-t border-white/5 overflow-hidden">
             <!-- Background Glow -->
             <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-20 flex flex-col items-center">
                    <span class="text-[10px] font-black uppercase tracking-[0.25em] text-primary italic mb-4">Kenapa Pakai Kost-Life?</span>
                    <h2 class="text-4xl md:text-5xl font-black text-white tracking-tighter">Fitur Sakti Buat <span class="text-primary italic">Audit Dompet.</span></h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                    <!-- Feature 1 -->
                    <div class="bg-card-bg p-10 rounded-[2.5rem] border border-white/10 hover:border-primary/50 transition-all group scale-100 hover:scale-[1.05] shadow-xl">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-8 border border-primary/20 group-hover:bg-primary group-hover:text-black transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 1v22M17 5H9.5a3.5 3.5 0 1 0 0 7h5a3.5 3.5 0 1 1 0 7H6"/></svg>
                        </div>
                        <h3 class="text-2xl font-black mb-4 tracking-tight">Real-time Budgeting</h3>
                        <p class="text-slate-400 font-medium leading-relaxed italic opacity-80 uppercase text-[11px] tracking-widest">Atur limit bulanan dan lihat langsung sisa saldo yang aman buat dihabiskan.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-card-bg p-10 rounded-[2.5rem] border border-white/10 hover:border-primary/50 transition-all group scale-100 hover:scale-[1.05] shadow-xl">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-8 border border-primary/20 group-hover:bg-primary group-hover:text-black transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 20V10M18 20V4M6 20v-4"/></svg>
                        </div>
                        <h3 class="text-2xl font-black mb-4 tracking-tight">Daily Quota Monitoring</h3>
                        <p class="text-slate-400 font-medium leading-relaxed italic opacity-80 uppercase text-[11px] tracking-widest">Sistem otomatis hitung jatah harian. Jadi nggak ada lagi drama akhir bulan makan mi instan!</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-card-bg p-10 rounded-[2.5rem] border border-white/10 hover:border-primary/50 transition-all group scale-100 hover:scale-[1.05] shadow-xl">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-8 border border-primary/20 group-hover:bg-primary group-hover:text-black transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/></svg>
                        </div>
                        <h3 class="text-2xl font-black mb-4 tracking-tight">Eksport Laporan PDF</h3>
                        <p class="text-slate-400 font-medium leading-relaxed italic opacity-80 uppercase text-[11px] tracking-widest">Cetak riwayat keuanganmu jadi laporan profesional cuma sekali klik. Audit jadi makin gampang.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-20 border-t border-white/5 bg-black text-white">
            <div class="max-w-7xl mx-auto px-6 flex flex-col items-center text-center">
                <div class="flex items-center gap-3 text-2xl font-black mb-8 group italic">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="text-primary group-hover:scale-110 transition-transform" stroke-width="3">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>
                    </svg>
                    Kost-Life
                </div>
                <p class="text-xs font-black uppercase tracking-[0.5em] text-text-label opacity-40 italic">Dibuat dengan semangat hemat oleh developer &copy; 2026</p>
                <div class="mt-8 flex gap-6 text-[10px] font-black uppercase tracking-widest text-text-label opacity-60">
                    <a href="#" class="hover:text-white">Privacy Policy</a>
                    <a href="#" class="hover:text-white">Terms of Use</a>
                    <a href="#" class="hover:text-white">Github Repo</a>
                </div>
            </div>
        </footer>
    </body>
</html>
