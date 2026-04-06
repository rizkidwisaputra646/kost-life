<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Kost-Life') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Favicon -->
        <link rel="icon" type="image/jpeg" href="{{ asset('icons/icon.jpeg') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-black text-white selection:bg-primary/30">
        <div class="flex flex-col min-h-screen">
            <!-- Navigation -->
            @include('layouts.partials.top-nav')
            
            <!-- Main Content -->
            <main class="flex-1 w-full max-w-[1100px] mx-auto px-6 py-8 md:py-12 mb-20 md:mb-0">
                @isset($header)
                    <header class="mb-8">
                        <div class="flex flex-col gap-1">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                {{ $slot }}
            </main>

            <!-- Bottom Navigation (Mobile Only) -->
            @include('layouts.partials.bottom-nav')
        </div>
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // Global SweetAlert Toast Configuration
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#1a1a1a',
                color: '#fff',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            // Handle Session Success/Status
            @if (session('success') || session('status'))
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') ?? session('status') }}"
                });
            @endif

            // Global Confirmation for Delete Actions
            document.addEventListener('submit', function (e) {
                if (e.target.classList.contains('delete-confirm')) {
                    e.preventDefault();
                    const form = e.target;

                    Swal.fire({
                        title: 'Yakin mau hapus?',
                        text: "Data yang dihapus nggak bisa balik lagi lho 😢",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#10b981', // primary emerald
                        cancelButtonColor: '#3f3f46', // zinc-700
                        confirmButtonText: 'Sesuai, Hapus!',
                        cancelButtonText: 'Batal',
                        background: '#1a1a1a',
                        color: '#fff',
                        customClass: {
                            popup: 'rounded-[2rem] border border-white/10 shadow-2xl',
                            confirmButton: 'px-8 py-3 rounded-xl font-black uppercase text-xs tracking-widest',
                            cancelButton: 'px-8 py-3 rounded-xl font-black uppercase text-xs tracking-widest'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });
        </script>
    </body>
</html>
