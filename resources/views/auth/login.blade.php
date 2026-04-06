<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black tracking-tight text-white uppercase italic">
            Masuk <span class="text-primary tracking-normal not-italic underline decoration-4 underline-offset-8">Akun</span>
        </h2>
        <p class="text-xs text-text-label font-bold uppercase tracking-widest mt-4">Selamat datang kembali!</p>
    </div>

    <x-auth-session-status class="mb-6 bg-primary/10 border border-primary/20 text-primary p-4 rounded-2xl text-xs font-black uppercase tracking-widest text-center" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
        @csrf

        <!-- Email Address -->
        <div class="flex flex-col gap-2">
            <x-input-label for="email" :value="__('Email Address')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                   class="w-full bg-black/40 border-2 border-border rounded-2xl px-6 py-4 text-white font-bold placeholder:text-text-label/30 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" />
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-2">
            <div class="flex justify-between items-center ml-2 mr-2">
                <x-input-label for="password" :value="__('Password')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label" />
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-black text-text-label/50 hover:text-primary transition-colors uppercase tracking-widest" href="{{ route('password.request') }}">
                        {{ __('Lupa?') }}
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="w-full bg-black/40 border-2 border-border rounded-2xl px-6 py-4 text-white font-bold placeholder:text-text-label/30 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center px-2">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember" class="w-5 h-5 rounded-lg bg-black/40 border-2 border-border text-primary focus:ring-primary/20 focus:ring-offset-0 transition-all cursor-pointer">
                <span class="ms-3 text-[10px] font-black text-text-label uppercase tracking-widest group-hover:text-white transition-colors">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex flex-col gap-4 mt-4">
            <button type="submit" class="w-full bg-primary text-black font-black uppercase tracking-[0.25em] text-sm py-5 rounded-2xl shadow-2xl shadow-primary/30 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                {{ __('Masuk Sekarang') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M13 7l5 5-5 5M6 7l5 5-5 5"/></svg>
            </button>
            
            <p class="text-center text-[10px] font-black text-text-label uppercase tracking-widest mt-2">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-primary hover:underline ml-1">Daftar Akun</a>
            </p>
        </div>
    </form>
</x-guest-layout>