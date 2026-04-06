<section>
    <header class="mb-8 flex justify-between items-center border-b border-border pb-4">
        <h2 class="text-lg font-black text-white uppercase tracking-tight">
            {{ __('Data Pengguna') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="flex flex-col gap-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Profile Photo (Hidden Input) -->
        <input type="file" class="hidden" name="photo" x-ref="photo"
               x-on:change="
                       photoName = $refs.photo.files[0].name;
                       const reader = new FileReader();
                       reader.onload = (e) => {
                           photoPreview = e.target.result;
                       };
                       reader.readAsDataURL($refs.photo.files[0]);
               ">

        <template x-if="photoPreview">
            <div class="p-4 bg-primary/5 border-2 border-dashed border-primary/20 rounded-2xl flex items-center gap-4">
                <img :src="photoPreview" class="w-12 h-12 rounded-full object-cover border-2 border-primary">
                <div class="flex flex-col">
                    <span class="text-[10px] font-black text-primary uppercase tracking-widest">Foto Siap Diunggah</span>
                    <span class="text-[9px] font-bold text-text-label italic" x-text="photoName"></span>
                </div>
            </div>
        </template>

        <div class="flex flex-col gap-2">
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                   class="w-full bg-[#1e1e1e] border-2 border-border rounded-xl px-5 py-3.5 text-white font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" :messages="$errors->get('name')" />
        </div>

        <div class="flex flex-col gap-2">
            <x-input-label for="email" :value="__('Alamat Email')" class="text-[10px] font-black uppercase tracking-[0.2em] text-text-label ml-2" />
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                   class="w-full bg-[#1e1e1e] border-2 border-border rounded-xl px-5 py-3.5 text-white font-bold focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none text-base">
            <x-input-error class="mt-1 text-[10px] font-bold text-red-500 uppercase tracking-widest ml-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-red-500/5 border border-red-500/20 rounded-2xl">
                    <p class="text-[10px] font-black text-red-400 uppercase tracking-widest">
                        {{ __('Alamat email belum terverifikasi.') }}

                        <button form="send-verification" class="ml-2 underline text-red-500 hover:text-red-400 font-black transition-colors">
                            {{ __('Klik di sini untuk kirim ulang.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-[10px] font-black text-primary uppercase tracking-widest">
                            {{ __('Link verifikasi baru telah dikirim ke email kamu.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 mt-2">
            <button type="submit" class="w-full bg-primary text-black font-black uppercase tracking-[0.2em] text-xs py-4 rounded-xl shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                {{ __('Update Profil') }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-[10px] font-black text-primary uppercase tracking-widest italic"
                >{{ __('Tersimpan! ✨') }}</p>
            @endif
        </div>
    </form>
</section>
