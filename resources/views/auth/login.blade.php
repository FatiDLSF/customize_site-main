@extends('layouts.Base_L')

@section('content')

<x-auth-session-status :status="session('status')" />

<section class="absolute h-screen w-screen grid place-content-center">
    <div class="absolute top-0 left-0 h-20 w-20 grid place-content-center">
        <a href="{{url('/')}}">
            <div class="h-14 w-14 rounded-full bg-azul-1 text-morado-1 text-4xl font-bold grid place-content-center">
                <p class="-mt-2">
                    <
                </p>
            </div>
        </a>
    </div> 
    <div class="p-5 rounded-lg bg-stone-200 bg-opacity-60 border-2 border-morado-1">
        <div class="grid place-content-center">
            <img class="h-40" src="{{asset('resources/web/logo/bg-logo.png')}}" alt="">
        </div>

        <form class="grid" method="POST" action="{{ route('login') }}">
        @csrf 
                {{-- Correo --}}
            <h1 class="ml-1 mb-1 text-morado-1 text-base font-medium">Correo</h1>
            <input class="rounded-lg border-2 transition-colors text-morado-1 font-medium bg-stone-50 bg-opacity-30 border-morado-1 focus:bg-opacity-60" 
                type="email"
                name="email"
                id="email"
                :value="old('email')" 
                required autofocus 
                autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="ml-1 mb-1 text-morado-1 text-base font-medium" />
            
                {{-- Contraseña --}}
            <h1 class="ml-1 my-1 text-morado-1 text-base font-medium">Contraseña</h1>    
            <input class="rounded-lg border-2 transition-colors text-morado-1 font-medium bg-stone-50 bg-opacity-30 border-morado-1 focus:bg-opacity-60" 
                type="password" 
                type="password"
                name="password"
                id="password"
                required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')" class="ml-1 mb-1 text-morado-1 text-base font-medium" />
            
                {{-- Otros --}}
            @if (Route::has('password.request'))
                <a class="my-3 text-sm text-morado-1 hover:font-medium hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-azul-1" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <x-primary-button  class="p-2 border-2 border-morado-1 text-stone-50 rounded-lg bg-morado-1
                transition-colors text-base grid place-content-center
                hover:bg-opacity-60 hover:cursor-pointer">
                {{ __('Log in') }}
            </x-primary-button> 
        </form>
    </div>
</section>

<section class="h-screen w-screen overflow-hidden">
        <div class="underlay-photo h-full w-full" style="background-image: url({{asset('resources/web/images/bg3.jpg')}})"></div>
        <div class="underlay-black"></div> 
</section>

@endsection