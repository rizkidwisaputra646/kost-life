<nav class="flex flex-col gap-3 border-r border-emerald-100 pr-4"> <a href="{{ route('dashboard') }}" 
       class="flex items-center gap-4 px-5 py-4 rounded-[1.5rem] transition-all duration-300 group
              {{ request()->routeIs('dashboard') 
                  ? 'bg-emerald-500 text-white font-black shadow-xl shadow-emerald-100 scale-[1.02]' 
                  : 'text-gray-500 font-bold hover:bg-emerald-50 hover:text-emerald-600' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="tracking-tighter uppercase text-sm">Dashboard</span>
    </a>

    <a href="{{ route('dashboard') }}#form-catat" 
       class="flex items-center gap-4 px-5 py-4 rounded-[1.5rem] text-gray-500 font-bold hover:bg-emerald-50 hover:text-emerald-600 transition-all group">
        <div class="p-1 rounded-lg bg-gray-50 group-hover:bg-white transition-colors border-2 border-transparent group-hover:border-emerald-200 text-gray-400 group-hover:text-emerald-500">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <span class="tracking-tighter uppercase text-sm">Catat Jajan</span>
    </a>

    <a href="{{ route('dashboard') }}" 
       class="flex items-center gap-4 px-5 py-4 rounded-[1.5rem] text-gray-500 font-bold hover:bg-emerald-50 hover:text-emerald-600 transition-all group text-opacity-50">
        <div class="p-1 rounded-lg bg-gray-50 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <span class="tracking-tighter uppercase text-sm italic opacity-50 text-red-400">Coming Soon</span>
    </a>
</nav>