<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Laravel</title>
    <!-- Vite -->
    @vite('resources/css/app.css')
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .tri {
            position: absolute;
            top: 0;
            left: 0;
            border-top: 240px solid rgb(220 252 231);
            border-right: 50px solid rgba(255, 255, 255, 0);
        }

        .tri-2 {
            position: absolute;
            top: 0;
            left: 0;
            border-top: 240px solid rgb(23 37 84);
            border-right: 50px solid rgba(255, 255, 255, 0);
        }
    </style>
</head>

<body class="bg-gray-500 overflow-x-hidden">

    @include('dashboard.website.header')

    @include('dashboard.website.main')

    @include('dashboard.website.footer')

</body>

</html>
