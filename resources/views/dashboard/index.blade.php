@extends('layouts.dashboard')

@section('script-page')
    <script>
        const checkbox = document.getElementById("toggle_1");
        const activo = document.getElementById("activo");
        const label = document.querySelector('label[for="toggle_1"]');
        const span = label.querySelector("span");

        checkbox.addEventListener("change", function() {
            if (checkbox.value === "1") {
                checkbox.value = 0;
                activo.value = 0;
                label.style.justifyContent = "flex-start";
                label.style.backgroundColor = "white";
                span.style.backgroundColor = "black";
            } else {
                checkbox.value = 1;
                activo.value = 1;
                label.style.justifyContent = "flex-end";
                label.style.backgroundColor = "black";
                span.style.backgroundColor = "white";

            }
        });
    </script>
@endsection

@section('content')
    <div class="grid grid-cols-2 gap-4">

        {{--  value="{{ isset($slider) ? $slider->link :  '' }}" --}}


        <div class=" 
         w-[40vw] rounded-lg
         h-[75vh] border border-morado-1
         block overflow-y-scroll overflow-x-hidden scroll-auto ">

            @if (isset($site_web))
                @include('dashboard.website.header')

                @include('dashboard.website.main')

                @include('dashboard.website.footer')
            @else
                @include('dashboard.website.page-not-found')
            @endif

        </div>


        <div class="grid place-content-center">
            <div class="bg-morado-1/80 rounded-xl p-5">
                <form action="{{ isset($site_web) ? route('dashboard.actualizar-web-site') : route('dashboard.guardar-web-site') }}" method="GET">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-morado-1 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-azul-1">Sitio web</h2>
                            <p class="mt-1 text-sm leading-6 text-amarillo-1">En este apartado se encuentran las configuraciones
                                basicas de tu propio sitio web, que es una personalizacion del estilo del sitio web principal
                            </p>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                <input type="hidden" id="id" value="1" name="id">

                                <div class="sm:col-span-4">
                                    <label for="username" class="block text-sm font-medium leading-6 text-azul-1">Nombre de
                                        dominio</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 bg-amarillo-1 ring-inset ring-azul-1 focus-within:ring-2 focus-within:ring-inset focus-within:ring-azul-1 sm:max-w-md">
                                            <span class="flex select-none items-center pl-3 text-negro sm:text-sm">zerosoft.site/mysite/</span>
                                            <input type="text" name="dominio" id="dominio" autocomplete="dominio"
                                                value="{{ isset($site_web) ? $site_web->dominio : '' }}"
                                                class="block flex-1 bg-amarillo-1 py-1.5 pl-1 border border-amarillo-1 text-negro placeholder:text-morado-1 placeholder:underline focus:ring-1 focus:border-l-0 focus:border-azul-1 ring-inset ring-azul-1 focus-within:ring-2 focus-within:ring-inset focus-within:ring-azul-1 sm:text-sm sm:leading-6"
                                                placeholder="nombre dominio">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-span-full flex">
                                    <label for="photo" class="block text-sm font-medium leading-6 text-azul-1">Activo</label>
                                    <label class="ml-4 relative inline-flex cursor-pointer items-center">
                                        @if (isset($site_web))
                                            <input type="hidden" id="activo" value="{{ $site_web->activo }}" name="activo">
                                            <input class="hidden" type="checkbox" id="toggle_1" value="{{ $site_web->activo }}">
                                            <label
                                                class="flex items-center w-10 border border-negro h-6 p-1 rounded-full cursor-pointer {{ $site_web->activo == 0 ? 'justify-start' : 'justify-end bg-negro' }}"
                                                for="toggle_1">
                                                <span class="w-4 h-4 rounded-full {{ $site_web->activo == 0 ? 'bg-negro' : 'bg-amarillo-1' }}"></span>
                                            </label>
                                        @else
                                            <input type="hidden" id="activo" value="1" name="activo">
                                            <input class="hidden" type="checkbox" id="toggle_1" value="1">
                                            <label class="flex items-center w-10 border border-negro h-6 p-1 rounded-full cursor-pointer justify-end bg-negro"
                                                for="toggle_1">
                                                <span class="w-4 h-4 rounded-full bg-amarillo-1"></span>
                                            </label>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        @isset($site_web)
                            <a href="{{ route('web-site.index', ['dominio' => $site_web->dominio]) }}" class="text-sm font-semibold leading-6 text-amarillo-1 hover:text-azul-1 hover:underline">Ver
                                Sitio</a>
                        @endisset
                        <button type="submit"
                            class="rounded-md bg-morado-1 px-3 py-2 text-sm font-semibold text-amarillo-1 shadow-sm hover:bg-azul-1 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-morado-1">{{ isset($site_web) ? 'Actualizar' : 'Crear' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
