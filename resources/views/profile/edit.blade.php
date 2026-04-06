<x-app-layout>
    <div class="flex flex-col gap-10 max-w-2xl mx-auto py-6" x-data="{ photoName: null, photoPreview: null }">
        <!-- Profile Header (Mockup Style) -->
        <header class="flex flex-col items-center gap-4 text-center">
            <div class="w-24 h-24 sm:w-28 sm:h-28 bg-black/40 border-4 border-primary rounded-full flex items-center justify-center shadow-2xl shadow-primary/20 relative group overflow-hidden">
                @if (Auth::user()->profile_photo_path)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover rounded-full">
                @else
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="text-primary" stroke-width="2.5">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                    </svg>
                @endif
                <div @click="$refs.photo.click()" class="absolute bottom-0 right-0 w-8 h-8 bg-primary rounded-full border-2 border-card-bg flex items-center justify-center text-black cursor-pointer hover:scale-110 transition-transform">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/></svg>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <h1 class="text-2xl sm:text-3xl font-black text-white tracking-tight uppercase italic">{{ Auth::user()->name }}</h1>
                <p class="text-sm text-text-label font-bold uppercase tracking-widest italic opacity-70">{{ Auth::user()->email }}</p>
            </div>
        </header>

        <div class="flex flex-col gap-8">
            <!-- Profile Info Card -->
            <div class="bg-card-bg p-8 rounded-[2.5rem] border border-border shadow-2xl">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Password Card -->
            <div class="bg-card-bg p-8 rounded-[2.5rem] border border-border shadow-2xl">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Delete Account Card (Styled as Logout/Danger combo from mockup) -->
            <div class="flex flex-col gap-4">
                <div class="bg-red-500/5 p-8 rounded-[2.5rem] border border-red-500/10 shadow-xl">
                    @include('profile.partials.delete-user-form')
                </div>

                <!-- Actual Logout Button (from mockup) -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full bg-[#3b0d0c] hover:bg-[#450a0a] border border-[#7f1d1d] text-[#f87171] font-black uppercase tracking-[0.2em] text-sm py-5 rounded-2xl transition-all shadow-xl active:scale-95">
                        {{ __('Keluar Akun') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
