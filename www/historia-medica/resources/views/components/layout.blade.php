<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .footer {
            height: 60px; /* Set the fixed height of the footer here */
            line-height: 60px; /* Vertically center the text there */
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">IPS inteliti</a>
        </div>
    </nav>
</header>
<main >
    <div class="container py-3">
        {{$slot}}
    </div>
</main>
<footer class="footer bg-dark fixed-bottom">
    <div class="container">
        <p class="text-white text-center">2022 — Inteliti</p>
    </div>
</footer>
@stack('scripts')
</body>
</html>
