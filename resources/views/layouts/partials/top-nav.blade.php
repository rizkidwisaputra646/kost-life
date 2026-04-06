<nav class="hidden md:flex sticky top-0 z-[100] h-[70px] bg-card-bg/90 backdrop-blur-xl border-b border-border w-full justify-center">
    <div class="w-full max-w-[1100px] px-6 flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-4 text-white font-black text-xl tracking-tighter">
            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="text-primary" stroke-width="3.5">
                <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>
            </svg>
            Kost-Life Desktop
        </a>
        <div class="flex gap-10 items-center">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 font-extrabold text-[13px] uppercase tracking-widest transition-all {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-text-label hover:text-white' }}">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Dashboard
            </a>
            <a href="{{ route('transactions.index') }}" class="flex items-center gap-2.5 font-extrabold text-[13px] uppercase tracking-widest transition-all {{ request()->routeIs('transactions.index') ? 'text-primary' : 'text-text-label hover:text-white' }}">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg>
                Transaksi
            </a>
            <a href="{{ route('budget.index') }}" class="flex items-center gap-2.5 font-extrabold text-[13px] uppercase tracking-widest transition-all {{ request()->routeIs('budget.index') ? 'text-primary' : 'text-text-label hover:text-white' }}">
                <svg class="w-[20px] h-[20px]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                Budget
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2.5 font-extrabold text-[13px] uppercase tracking-widest transition-all {{ request()->routeIs('profile.edit') ? 'text-primary' : 'text-text-label hover:text-white' }}">
                <div class="w-[20px] h-[20px] rounded-full overflow-hidden flex items-center justify-center">
                    @if (Auth::user()->profile_photo_path)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" class="w-full h-full object-cover">
                    @else
                        <svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    @endif
                </div>
                Profil
            </a>
            <form method="POST" action="{{ route('logout') }}" class="ml-4">
                @csrf
                <button type="submit" class="flex items-center gap-2 font-semibold text-sm text-red-500 hover:text-red-400 transition-colors">
                    <svg class="w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
