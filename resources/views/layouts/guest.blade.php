<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GordoS House') }}</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <!-- Google Fonts for Modular Typography System -->
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Serif+Display&family=IBM+Plex+Mono&family=Inter:wght@400;700&family=JetBrains+Mono&family=Libre+Baskerville:ital@0;1&family=Lora:ital,wght@0,400;0,700&family=Nunito:wght@400;700&family=Oswald:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center bg-light">
            <div class="text-center mb-4">
                <a href="/">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 60px; width: 60px;">
                </a>
            </div>

            <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
                {{ $slot }}
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>