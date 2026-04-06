<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black tracking-tight text-white uppercase italic">
            Daftar <span class="text-primary tracking-normal not-italic underline decoration-4 underline-offset-8">Akun</span>
        </h2>
        <p class="text-xs text-text-label font-bold uppercase tracking-widest mt-4 italic">Bergabung dengan Kost-Life sekarang!</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-6">
        @csrf

        <!-- Name -->
        <div class="flex flex-col gap-2">
            <x-input-label for="name" :value="__('Full Name')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                   class="w-full bg-black/40 border-2 border-border rounded-2xl px-6 py-4 text-white font-bold placeholder:text-text-label/30 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" />
        </div>

        <!-- Email Address -->
        <div class="flex flex-col gap-2">
            <x-input-label for="email" :value="__('Email Address')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                   class="w-full bg-black/40 border-2 border-border rounded-2xl px-6 py-4 text-white font-bold placeholder:text-text-label/30 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" />
        </div>

        <!-- Password -->
        <div class="flex flex-col gap-2">
            <x-input-label for="password" :value="__('Password')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="w-full bg-black/40 border-2 border-border rounded-2xl px-6 py-4 text-white font-bold placeholder:text-text-label/30 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" />
        </div>

        <!-- Confirm Password -->
        <div class="flex flex-col gap-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="w-full bg-black/40 border-2 border-border rounded-2xl px-6 py-4 text-white font-bold placeholder:text-text-label/30 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" />
        </div>

        <!-- Actions -->
        <div class="flex flex-col gap-4 mt-4">
            <button type="submit" class="w-full bg-primary text-black font-black uppercase tracking-[0.25em] text-sm py-5 rounded-2xl shadow-2xl shadow-primary/30 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                {{ __('Daftar Sekarang') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            </button>
            
            <p class="text-center text-[10px] font-black text-text-label uppercase tracking-widest mt-2">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-primary hover:underline ml-1">Masuk Sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>
