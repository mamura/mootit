    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>{{ $title ?? 'Page Title' }}</title>
            @livewireStyles
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>
        <body class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex items-center justify-center p-6">
            <div class="w-full max-w-4xl bg-white shadow-lg rounded-xl p-8">
                {{ $slot }}
            </div>
        </body>
    </html>
