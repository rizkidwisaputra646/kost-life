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
    <body class="bg-black text-white font-sans antialiased selection:bg-primary/30">
        <div class="min-h-screen flex flex-col justify-center items-center p-6">
            <div class="w-full max-w-md">
                <div class="flex justify-center mb-8">
                    <a href="/" class="flex items-center gap-3 text-white font-extrabold text-2xl">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="text-primary" stroke-width="3">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>
                        </svg>
                        Kost-Life
                    </a>
                </div>

                <div class="bg-card-bg p-8 rounded-[2rem] border border-border shadow-2xl">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
