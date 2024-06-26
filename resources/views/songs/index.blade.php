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
                    <ul>
                    @foreach($songs as $song)
                            <li>({{ $song->id }}) {{ $song->name }} <a class="text-red-500" href="/session/add/{{ $song->id }}">toevoegen</a>

                            @foreach($song->Playlists as $playlist)
                                {{ $playlist->name }},
                            @endforeach

                            </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
