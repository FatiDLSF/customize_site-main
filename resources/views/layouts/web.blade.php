<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Zerosoft</title>
    <!-- Vite -->
    @vite('resources/css/app.css')
</head>

<body class="overflow-x-hidden">

    <header class="bg-morado-1 text-neutral-200">
        @if (Route::has('login'))
                @auth
                    <div class="h-12 w-screen py-3 px-2 flex font-semibold">
                        <div class="w-1/3">

                        </div>

                        <div class="h-12 w-1/3 grid place-content-center">
                            <img class="w-[67px] -mt-5 filter invert sepia" src="{{ URL::asset('resources/web/logo/logo.png') }}">
                        </div>

                        <a href="{{ url('/dashboard') }}"
                            class="w-1/3 text-right font-semibold text-amarillo-1 hover:text-azul-1 dark:text-gray-400 dark:hover:text-white hover:underline">
                            Dashboard
                        </a>
                    </div>
                @else
                    <div class="h-12 w-screen py-3 px-2 flex font-semibold">
                        <a href="{{ route('login') }}"
                            class="w-1/3 font-semibold text-amarillo-1 hover:text-azul-1 dark:text-gray-400 dark:hover:text-white hover:underline">
                            Log in
                        </a>

                        <div class="h-12 w-1/3 grid place-content-center">
                            <img class="w-[67px] -mt-5 filter invert sepia" src="{{ URL::asset('resources/web/logo/logo.png') }}">
                        </div>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="w-1/3 text-right ml-4 font-semibold text-amarillo-1 hover:text-azul-1 dark:text-gray-400 dark:hover:text-white hover:underline">
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
        @endif 
    </header>

    @yield('content')

    <footer class="bg-morado-1 py-4">
        <div class="grid grid-cols-2">
            <div>
                <div class="pt-12 pb-6 grid place-content-center">
                    <img class="w-44 -my-8 filter invert sepia" src="{{ URL::asset('resources/web/logo/logo.png') }}">
                </div>
                <div class="grid place-content-center font-light text-lg text-amarillo-1">
                    <p> Creando oportunidades </p>
                </div>
            </div>
            <div class="flex">
                <div class="w-80 grid place-content-center text-azul-1">
                    <div class="grid">
                        <div class="w-full grid grid-cols-2 place-content-between font-semibold">
                            <p class="hover:underline">Mapa del sitio</p>
                            <p class="hover:underline">Aviso de privacidad</p>
                        </div>
                    </div>
                    <div class="font-semibold pt-4 hover:underline">
                        <p>Consulta los costos y las comisiones de nuestro productos </p>
                    </div>
                </div>
                <div class="w-10  grid place-content-center py-4">
                    <div class="grid gap-5">
                        <svg class="h-6 w-6 text-azul-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                        <svg class="h-6 w-6 text-azul-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                        <svg class="h-6 w-6 text-azul-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
