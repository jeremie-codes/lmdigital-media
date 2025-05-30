<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Meta Tags -->
    @yield('meta')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/font-icons.min.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <div class="font-sans text-black">
            <!-- Breaking News -->
            @include('layouts.breaking')

            <!-- Page header navigation -->
            @include('layouts.navigation')

            <!-- Page Content -->
            @if(session('newsletter_success'))
                <div class="bg-green-500/20 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                    {{ session('newsletter_success') }}
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function() {
                            document.querySelector('.bg-green-500').classList.add('hidden');
                        }, 5000); // 5000 milliseconds = 5 seconds
                    });
                </script>
            @endif

            @if(session('newsletter_error'))
                <div class="bg-red-500/20 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center">
                    {{ session('newsletter_success') }}
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function() {
                            document.querySelector('.bg-red-500').classList.add('hidden');
                        }, 5000); // 5000 milliseconds = 5 seconds
                    });
                </script>
            @endif

            @if(session('success'))
                <div class="bg-green-500/20 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                    {{ session('success') }}
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function() {
                            document.querySelector('.bg-green-500').classList.add('hidden');
                        }, 5000); // 5000 milliseconds = 5 seconds
                    });
                </script>
            @endif

            @if(session('error'))
                <div class="bg-red-500/20 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center">
                    {{ session('error') }}
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function() {
                            document.querySelector('.bg-red-500').classList.add('hidden');
                        }, 5000); // 5000 milliseconds = 5 seconds
                    });
                </script>
            @endif

            <main>
                @yield('content')
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
