@props(['title' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Homepage for Kevin Oosterveen's personal website.">
    <title>🥳</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="antialiased">
    <div class="relative min-h-screen bg-gray-200">
        <div class="container mx-auto">
        @if($title)
            <h1 {{ $title->attributes->merge(['class' => 'text-4xl font-bold']) }}"> {{ $title }}</h1>
        @endif
        
        {{ $slot }}
    </div>
    </div>
</body>
</html>

@stack('scripts')
