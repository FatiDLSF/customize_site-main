{{--  Start modal --}}

<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
    style="background: rgba(0,0,0,.7);">
    <div class="border border-negro modal-container bg-morado-1 w-11/12 md:max-w-3xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6 text-azul-1">

            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">{{ isset($slider) ? 'Editar' : 'Agregar' }} Slider</p>
                <div class="modal-close cursor-pointer z-50 hover:text-amarillo-1">
                    <svg class="fill-current bg-azul-1 rounded-full" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>

            <form action="{{ isset($slider) ? route('dashboard.sliders.actualizar') : route('dashboard.sliders.guardar') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="my-5">
                    <div class="max-w-md mx-auto">
                        <div class="divide-y divide-gray-200">
                            <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">

                                @isset($slider)
                                    <input type="hidden" id="id" value="{{ $slider->id }}" name="id">
                                @endisset


                                <div class="flex flex-col">
                                    <label class="leading-loose">Titulo</label>
                                    <input type="text" value="{{ isset($slider) ? $slider->titulo : '' }}" name="titulo" placeholder="Titulo"
                                        class="px-4 py-2 border bg-azul-1/20 focus:ring-azul-1 focus:border-azul-1 w-full sm:text-sm border-azul-1 rounded-md focus:outline-none placeholder:text-azul-1">
                                </div>

                                <div class="flex flex-col">
                                    <fieldset class="w-full space-y-1 text-gray-800">
                                        <label class="leading-loose">Imagen</label>
                                        <div
                                            class="grid grid-flow-row auto-rows-2 border bg-azul-1/20 focus:ring-azul-1 focus:border-azul-1 w-full sm:text-sm border-azul-1 rounded-md focus:outline-none">
                                            <input name="imagen" type="file" multiple="multiple" id="image" accept="image/*" id="files"
                                                class="py-5 px-5">
                                            <img class="px-5 pb-5 h-28" id="imagenPrevisualizacion">
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="flex flex-col">
                                    <label class="leading-loose">Link</label>
                                    <input type="text" value="{{ isset($slider) ? $slider->link : '' }}" name="link"
                                        class="px-4 py-2 border bg-azul-1/20 focus:ring-azul-1 focus:border-azul-1 w-full sm:text-sm border-azul-1 rounded-md focus:outline-none placeholder:text-azul-1"
                                        placeholder="www.google.com">
                                </div>

                                <div class="flex items-center space-x-4">

                                    <div class="flex flex-col">
                                        <label class="leading-loose">Spam</label>
                                        <div class="relative focus-within:text-azul-1">
                                            <input type="text" name="spam" value="{{ isset($slider) ? $slider->spam : '' }}"
                                                class="pr-4 pl-10 py-2 border bg-azul-1/20 focus:ring-azul-1 focus:border-azul-1 w-full sm:text-sm border-azul-1 rounded-md focus:outline-none placeholder:text-azul-1"
                                                placeholder="Ver mas">
                                        </div>
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="leading-loose">Activo</label>
                                        <div class="relative focus-within:text-azul-1 text-azul-1">
                                            <label class="ml-4 relative inline-flex cursor-pointer items-center">
                                                @if (isset($slider))
                                                    <input type="hidden" id="activo" value="1" name="activo">
                                                    <input class="hidden" type="checkbox" id="toggle_1" value="1">
                                                    <label class="flex items-center w-10 border border-azul-1 h-6 p-1 rounded-full cursor-pointer justify-start"
                                                        for="toggle_1">
                                                        <span class="w-4 h-4 rounded-full bg-morado-1"></span>
                                                    </label>
                                                @else
                                                    <input type="hidden" id="activo" value="1" name="activo">
                                                    <input class="hidden" type="checkbox" id="toggle_1" value="1">
                                                    <label
                                                        class="flex items-center w-10 border border-azul-1 h-6 p-1 rounded-full cursor-pointer justify-end bg-black"
                                                        for="toggle_1">
                                                        <span class="w-4 h-4 rounded-full bg-azul-1"></span>
                                                    </label>
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="button" class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                    <button type="submit"
                        class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">{{ isset($slider) ? 'Actualizar' : 'Crear' }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
{{--  End modal --}}
