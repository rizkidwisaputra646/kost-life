<nav class="md:hidden fixed bottom-0 left-0 right-0 h-20 bg-card-bg border-t border-border flex justify-around items-center backdrop-blur-xl z-[1000]">
    <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 text-[10px] font-bold transition-colors {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-text-label' }}">
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
        Home
    </a>
    <a href="{{ route('transactions.index') }}" class="flex flex-col items-center gap-1 text-[10px] font-bold transition-colors {{ request()->routeIs('transactions.index') ? 'text-primary' : 'text-text-label' }}">
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/>
        </svg>
        Transaksi
    </a>
    <a href="{{ route('transactions.create') }}" class="relative -top-6 bg-primary w-14 h-14 rounded-full flex justify-center items-center text-black shadow-lg shadow-primary/40 border-4 border-black active:scale-95 transition-transform">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
    </a>
    <a href="{{ route('budget.index') }}" class="flex flex-col items-center gap-1 text-[10px] font-black uppercase tracking-tighter transition-colors {{ request()->routeIs('budget.index') ? 'text-primary' : 'text-text-label' }}">
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
        </svg>
        Budget
    </a>
    <a href="{{ route('profile.edit') }}" class="flex flex-col items-center gap-1 text-[10px] font-bold transition-colors {{ request()->routeIs('profile.edit') ? 'text-primary' : 'text-text-label' }}">
        <div class="w-6 h-6 rounded-full overflow-hidden border {{ request()->routeIs('profile.edit') ? 'border-primary' : 'border-transparent' }} flex items-center justify-center">
            @if (Auth::user()->profile_photo_path)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" class="w-full h-full object-cover">
            @else
                <svg class="w-full h-full" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
            @endif
        </div>
        Profil
    </a>
</nav>
