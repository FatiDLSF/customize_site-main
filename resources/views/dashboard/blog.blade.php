@extends('layouts.dashboard')


@section('style-page')
    {{-- modal --}}
    <style>
        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.faster {
            -webkit-animation-duration: 500ms;
            animation-duration: 500ms;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>
@endsection

@section('script-page')
    @if (isset($modal))
        <script>
            // Abre el modal cuando se carga la página
            document.addEventListener('DOMContentLoaded', function() {
                openModal();
            });
        </script>
    @endif

    {{-- modal --}}
    <script>
        const modal = document.querySelector('.main-modal');
        const closeButton = document.querySelectorAll('.modal-close');

        const modalClose = () => {
            modal.classList.remove('fadeIn');
            modal.classList.add('fadeOut');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        }

        const openModal = () => {
            modal.classList.remove('fadeOut');
            modal.classList.add('fadeIn');
            modal.style.display = 'flex';
        }

        for (let i = 0; i < closeButton.length; i++) {

            const elements = closeButton[i];

            elements.onclick = (e) => modalClose();

            modal.style.display = 'none';

            window.onclick = function(event) {
                if (event.target == modal) modalClose();
            }
        }
    </script>

    {{-- siwtch --}}
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

    {{-- Input Image Modal --}}
    <script>
        // Obtener referencia al input y a la imagen
        const $image = document.querySelector("#image"),
            $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

        // Escuchar cuando cambie el valor del input
        $image.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $image.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenPrevisualizacion.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenPrevisualizacion.src = objectURL;
        });
    </script>
@endsection

@section('content')
    {{--  --}}
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
        <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-azul-1 shadow-lg px-12">
            <div class="flex justify-between">
                <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                    <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                        <div class="flex">
                            <span
                                class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-negro text-sm">
                                <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z"
                                        stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <input type="text"
                            class="flex-shrink flex-grow leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs text-morado-1 bg-azul-1 font-thin placeholder:text-negro"
                            placeholder="Search">
                    </div>

                </div>
                <a href="#" class="border-2 border-negro bg-morado-1 rounded-lg px-3 py-2 text-azul-1 cursor-pointer hover:bg-morado-1/70">
                    Agregar Blog
                </a>

            </div>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-stone-200 shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class=" px-6 py-3 border-b-2 border-morado-1 text-left leading-4 text-morado-1 tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-3 border-b-2 border-morado-1 text-left text-sm leading-4 text-morado-1 tracking-wider">
                            titulo</th>
                        <th class="px-6 py-3 border-b-2 border-morado-1 text-left text-sm leading-4 text-morado-1 tracking-wider">
                            imagen</th>
                        <th class="px-6 py-3 border-b-2 border-morado-1 text-left text-sm leading-4 text-morado-1 tracking-wider">
                            link</th>
                        <th class="px-6 py-3 border-b-2 border-morado-1 text-left text-sm leading-4 text-morado-1 tracking-wider">
                            spam</th>
                        <th class="px-6 py-3 border-b-2 border-morado-1 text-left text-sm leading-4 text-morado-1 tracking-wider">
                            Activo</th>
                        <th class="px-6 py-3 border-b-2 border-morado-1 text-left text-sm leading-4 text-morado-1 tracking-wider">
                        </th>

                    </tr>
                </thead>
                <tbody class="bg-white">

                    @isset($sliders)
                        @foreach ($sliders as $dato)
                            <tr>
                                <td class=" px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <div class="flex items-center">
                                        <div>
                                            <div class="text-sm leading-5 text-gray-800">{{ $dato->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <div class="text-sm leading-5 text-blue-900">{{ $dato->titulo }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                    <img src="{{ asset('resources/web/customize/sliders/' . $dato->imagen) }}" class="max-w-sm rounded border bg-gray p-1 w-48"
                                        alt="..." />
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                    {{ $dato->link }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                    {{ $dato->spam }}</td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                    @if ($dato->activo == 1)
                                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative text-xs">on</span>
                                        </span>
                                    @else
                                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                            <span class="relative text-xs">off</span>
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                    <form action="{{ route('#') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $dato->id }}">
                                        <a href="{{ route('dashboard.sliders.editar', ['id' => $dato->id]) }}"
                                            class="px-4 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Editar</a>
                                        <button type="submit"
                                            class="px-4 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>

        </div>
    </div>

    @include('dashboard.partials.sliders')

@endsection
