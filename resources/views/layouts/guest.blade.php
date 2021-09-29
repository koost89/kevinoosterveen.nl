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
        <livewire:styles/>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body>
        <div class="font-sans min-h-screen bg-black text-white antialiased">
            <div class="max-w-screen-2xl mx-auto mb-10 pt-10 space-x-2">
                <div class="flex">
                    <h1 class="text-4xl font-extrabold text-white self-center">
                        <a href="/">{{ __("Laravel Bits") }}</a>
                    </h1>
                    <div class="flex flex-1 max-w-2xl ml-auto">
                        <livewire:search/>
                    </div>
                </div>
            </div>
            <div class="container mx-auto">
{{--                <div class="mb-4">--}}
{{--                </div>--}}
                {{ $slot }}
            </div>
        </div>
        <livewire:scripts/>
    </body>
</html>
