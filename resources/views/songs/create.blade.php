<?php /** @var App\Models\Song $song */ ?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('song.store') }}">
                        @csrf

                        <!-- Titel -->
                        <div>
                            <x-label for="name" :value="__('Titel')" />
                            <x-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                        </div>

                        <!-- Artiest -->
                        <div>
                            <x-label for="duration" :value="__('Duur (seconden)')" />
                            <x-input id="duration" class="block mt-1 w-full" type="duration" name="duration" :value="old('duration')" />
                        </div>


                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-3">
                                {{ __('Opslaan') }}
                            </x-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
