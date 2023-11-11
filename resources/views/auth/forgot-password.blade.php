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

        <div class="w-72 text-justify mb-4 font-medium text-sm text-morado-1">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form class="grid" method="POST" action="{{ route('password.email') }}">
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

            <x-primary-button  class="p-2 mt-4 border-2 border-morado-1 text-stone-50 rounded-lg bg-morado-1
                transition-colors text-base grid place-content-center
                hover:bg-opacity-60 hover:cursor-pointer">
                {{ __('Email Password Reset Link') }}
            </x-primary-button> 
        </form>
    </div>
</section>

<section class="h-screen w-screen overflow-hidden">
        <div class="underlay-photo h-full w-full" style="background-image: url({{asset('resources/web/images/bg2.jpg')}})"></div>
        <div class="underlay-black"></div> 
</section>

@endsection

{{--  
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
--}}