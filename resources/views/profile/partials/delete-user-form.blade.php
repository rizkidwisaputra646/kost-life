<section class="flex flex-col gap-6">
    <header class="border-b border-red-500/20 pb-4">
        <h2 class="text-lg font-black text-red-500 uppercase tracking-tight">
            {{ __('Zona Bahaya') }}
        </h2>
        <p class="mt-2 text-[10px] font-bold text-text-label uppercase tracking-widest italic opacity-60 leading-relaxed">
            {{ __('Sekali akun Anda dihapus, semua data jajan, histori, dan budget Anda akan hilang selamanya.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="w-fit px-8 py-3 bg-red-500/10 border-2 border-red-500/20 text-red-500 font-black uppercase text-[10px] tracking-[0.25em] rounded-xl hover:bg-red-500 hover:text-white transition-all active:scale-95"
    >{{ __('Hapus Akun Permanen') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-card-bg border border-border rounded-[2.5rem]">
            @csrf
            @method('delete')

            <h2 class="text-xl font-black text-white uppercase tracking-tight">
                {{ __('Yakin mau hapus, :name?', ['name' => Auth::user()->name]) }}
            </h2>

            <p class="mt-4 text-xs font-bold text-text-label uppercase tracking-widest italic leading-relaxed">
                {{ __('Semua data histori transaksi Anda tidak dapat dikembalikan. Silakan masukkan password untuk konfirmasi terakhir.') }}
            </p>

            <div class="mt-8 flex flex-col gap-2">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <input id="password" name="password" type="password" placeholder="Password Kamu"
                       class="w-full bg-black/40 border-2 border-border rounded-xl px-6 py-4 text-white font-bold focus:border-red-500 focus:ring-4 focus:ring-red-500/10 transition-all outline-none text-base">

                <x-input-error class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" :messages="$errors->userDeletion->get('password')" />
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="px-6 py-3 border-2 border-border text-text-label font-black uppercase text-[10px] tracking-widest rounded-xl hover:bg-white/5 transition-colors">
                    {{ __('Batal') }}
                </button>

                <button type="submit" class="px-10 py-3 bg-red-500 text-white font-black uppercase text-[10px] tracking-widest rounded-xl shadow-xl shadow-red-500/20 hover:scale-105 active:scale-95 transition-all">
                    {{ __('Ya, Hapus') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
