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

        <form class="grid" method="POST" action="{{ route('register') }}">
        @csrf 
                {{-- nombre --}} {{-- focus:border-azul-1 focus:ring-azul-1 --}}
            <h1 class="ml-1 mb-1 text-morado-1 text-base font-medium">Nombre</h1>
            <input class="h-10 px-3 rounded-lg border-2 transition-colors text-morado-1 font-medium bg-stone-50 bg-opacity-30 border-morado-1 focus:bg-opacity-60 focus:border-[#296CF2] focus:ring-[#296CF2] focus:ring-1 focus:outline-none" 
                type="name"
                name="name"
                id="name"
                :value="old('name')" 
                required autofocus 
                autocomplete="username"/>
            <x-input-error :messages="$errors->get('name')" class="ml-1 mb-1 text-morado-1 text-base font-medium" />
                
                {{-- Correo --}}
            <h1 class="ml-1 my-1 text-morado-1 text-base font-medium">Correo</h1>
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
                name="password"
                id="password"
                required autocomplete="current-password"/>
            <x-input-error :messages="$errors->get('password')" class="ml-1 mb-1 text-morado-1 text-base font-medium" />
            
            <h1 class="ml-1 my-1 text-morado-1 text-base font-medium">Contraseña</h1>    
            <input class="rounded-lg border-2 transition-colors text-morado-1 font-medium bg-stone-50 bg-opacity-30 border-morado-1 focus:bg-opacity-60" 
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="ml-1 mb-1 text-morado-1 text-base font-medium" />
                
                {{-- Otros --}}
            <div class="mt-2 flex place-content-between">
                <a class="mt-2 text-base text-morado-1 hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-morado-1" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button  class="p-2 border-2 border-morado-1 text-stone-50 rounded-lg bg-morado-1
                    transition-colors text-base grid place-content-center
                    hover:bg-opacity-60 hover:cursor-pointer">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
             
        </form>
    </div>
</section>

<section class="h-screen w-screen overflow-hidden">
        <div class="underlay-photo h-full w-full" style="background-image: url({{asset('resources/web/images/bg1.jpg')}})"></div>
        <div class="underlay-black"></div> 
</section>

@endsection

{{--  
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" 
                            class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
--}}