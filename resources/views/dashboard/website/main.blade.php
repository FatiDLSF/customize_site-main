@isset($sliders)
    @foreach ($sliders as $dato)
        <section>
            <div class="h-[530px] w-auto bg-blue-950 relative">
                <div class="h-[310px] overflow-hidden">
                    <img class="h-[100vh] w-screen bg-contain bg-center " src="{{ URL::asset('resources/web/customize/sliders/' . $dato->imagen) }}" alt="">
                </div>
                <div class="p-5 text-neutral-200">
                    <h1 class="font-bold text-[27px]">
                        {{ $dato->titulo }}
                    </h1>
                    <div class="w-52 p-3 mt-6 bg-blue-500">
                        <a href="http://{{ $dato->link }}" class="font-semibold text-base text-center">
                            {{ $dato->spam }}
                        </a>
                    </div>
                </div>
                <div class="h-10 w-screen grid place-content-center absolute bottom-0">
                    <div class="flex gap-5">
                        <div class="h-2.5 w-2.5 bg-neutral-200 border-neutral-200 rounded-full"></div>
                        <div class="h-2.5 w-2.5 border-[1px] border-neutral-200 rounded-full"></div>
                        <div class="h-2.5 w-2.5 border-[1px] border-neutral-200 rounded-full"></div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endisset

<section>
    <div class="h-96 bg-amarillo-1 grid place-content-center overflow-hidden">
        <div class="h-60 bg-azul-1 flex">
            <div class="h-full w-[100%]">
                <div class="px-16 py-10">
                    <H2 class="pb-2 font-normal text-xl text-morado-1">¿lorem?</H2>
                    <h1 class="pb-2 font-light">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                        
                    </h1>
                    <button class="border-x-[20px] border-y-2 p-2 border-morado-1 bg-morado-1 text-azul-1 font-semibold">
                        Boton 
                    </button>
                </div>
            </div>
            <div class="relative w-3/5">
                <div class="tri"></div>
                <img class="h-full object-cover object-right" src="{{ URL::asset('resources/web/images/mujer-home.png') }}" alt="">
            </div>
        </div>
    </div>
</section>


