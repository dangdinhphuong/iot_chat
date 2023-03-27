<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta id="MetaDescription" name="DESCRIPTION" content="Bài dự thi đại diện trường Đại học Thuỷ lợi" />
        <meta id="MetaKeywords" name="KEYWORDS" content="Bài dự thi đại diện trường Đại học Thuỷ lợi" />
        <meta id="MetaGenerator" name="GENERATOR" content="DotNetNuke " />
        <meta id="MetaRobots" name="ROBOTS" content="INDEX, FOLLOW" />
        <link rel="shortcut icon" type="image/x-icon" href="http://www.tlu.edu.vn/Portals/0/2014/Logo-WRU.png" />
        <title>IOT</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
