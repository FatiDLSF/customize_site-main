<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zerosoft</title>

    {{-- Vite --}}
    @vite('resources/css/app.css')

    <!-- component -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />

    @yield('style-page')
</head> 
<body>

    <div class="min-h-screen flex flex-row bg-amarillo-1">
        <div class="flex flex-col w-56 bg-morado-1 rounded-r-3xl overflow-hidden">
            <div class="flex items-center justify-center h-20 shadow-md shadow-negro/40">
                <a href="{{ route('dashboard.index') }}">
                    <img class="h-20 filter invert sepia" src="{{asset('resources/web/logo/logo.png')}}" alt=""> 
                </a>
            </div>
            <ul class="flex flex-col py-4">
                <li>
                    <a href="{{ route('dashboard.index') }}"
                        class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-amarillo-1 hover:text-azul-1">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-home"></i></span>
                        <span class="text-sm font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.sliders.index') }}"
                        class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-amarillo-1 hover:text-azul-1">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-drink"></i></span>
                        <span class="text-sm font-medium">Sliders</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.lanzadera.index') }}"
                        class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-amarillo-1 hover:text-azul-1">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg">
                            <i class="bx bx-store"></i>
                        </span>
                        <span class="text-sm font-medium">Lanzaderas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.banners.index') }}"
                        class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-amarillo-1 hover:text-azul-1">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-shopping-bag"></i></span>
                        <span class="text-sm font-medium">Banners</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.noticias.index') }}"
                        class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-amarillo-1 hover:text-azul-1">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-chat"></i></span>
                        <span class="text-sm font-medium">Noticias</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.blogs.index') }}"
                        class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-amarillo-1 hover:text-azul-1">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-chat"></i></span>
                        <span class="text-sm font-medium">Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}"
                        class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-amarillo-1 hover:text-azul-1">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-user"></i></span>
                        <span class="text-sm font-medium">Profile</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="flex
                            flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in
                            duration-200 text-amarillo-1 hover:text-azul-1">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg"><i class="bx bx-log-out"></i></span>
                            <span class="text-sm font-medium">Logout</span>
                        </a>
                    </form>

                </li>

            </ul>
        </div>

        <div class="px-10 pt-24 pb-20">

            @yield('content')

        </div>
    </div>

    @yield('script-page')

</body>

</html>
