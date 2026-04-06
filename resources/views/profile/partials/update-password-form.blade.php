<section>
    <header class="mb-8 flex justify-between items-center border-b border-border pb-4">
        <h2 class="text-lg font-black text-white uppercase tracking-tight">
            {{ __('Keamanan') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="flex flex-col gap-6">
        @csrf
        @method('put')

        <div class="flex flex-col gap-2">
            <x-input-label for="current_password" :value="__('Password Saat Ini')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="current_password" name="current_password" type="password" required autocomplete="current-password"
                   class="w-full bg-[#1e1e1e] border-2 border-border rounded-xl px-5 py-3.5 text-white font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div class="flex flex-col gap-2">
            <x-input-label for="password" :value="__('Password Baru')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Minimal 8 karakter"
                   class="w-full bg-[#1e1e1e] border-2 border-border rounded-xl px-5 py-3.5 text-white font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base placeholder:text-text-label/20">
            <x-input-error class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" :messages="$errors->updatePassword->get('password')" />
        </div>

        <div class="flex flex-col gap-2">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                   class="w-full bg-[#1e1e1e] border-2 border-border rounded-xl px-5 py-3.5 text-white font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4 mt-2">
            <button type="submit" class="w-full bg-primary text-black font-black uppercase tracking-[0.2em] text-xs py-4 rounded-xl shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                {{ __('Ganti Password') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M12 11l5 5-5 5M12 4l5 5-5 5"/></svg>
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-[10px] font-black text-primary uppercase tracking-widest italic"
                >{{ __('Berhasil! 🔐') }}</p>
            @endif
        </div>
    </form>
</section>
