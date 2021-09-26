<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans min-h-screen bg-black text-white antialiased">
            <div class="flex max-w-[100rem] mx-auto h-16 mb-10 pt-10">
                <h1 class="p-4 text-4xl font-extrabold text-white self-center">
                    <a href="/">{{ __("Laravel Bits") }}</a>
                </h1>
            </div>
            <div class="container mx-auto">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
