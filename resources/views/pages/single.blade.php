@extends('layouts.app')

@section('title', $movie['title'])

@section('content')
    <!-- Banner -->
    <div class="single">
        <section id="banner">
            <span class="image object">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $movie['poster_path'] }}" alt="{{ $movie['title'] }}" />
            </span>
            <div class="content lg:mt-10">
                <header>
                    <p>{{ $movie['tagline'] }}</p>
                    <h1 class="font-bolder text-4xl py-4">{{ $movie['title'] }}</h1>
                </header>
                <p class="pb-4">{{ $movie['overview'] }}</p> 
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 mb-4">
                    <p><strong>Runtime:</strong> {{ $movie['runtime']. 'mins' }}</p>
                    <p><strong>Vote Average:</strong> {{ $movie['vote_average'] * 10 . '%' }}</p>
                    <p><strong>Language:</strong> {{ $movie['original_language'] }}</p>
                    <p><strong>Vote Count:</strong> {{ $movie['vote_count'] }}</p>
                </div>
                <div class="mb-8">
                    <strong>Genres:</strong> 
                    @foreach ($movie['genres'] as $genre)
                    {{ $genre['name'] }}@if (!$loop->last),@endif
                    @endforeach
                </div>
                <hr>
                <h4 class="mt-4 font-bold text-lg">Featured Casts</h4>
                <div class="grid grid-cols-2 mb-2 mt-4">
                    @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index < 2)
                            <p>
                                
                                {{ $crew['name'] }} <br>
                                <small style="font-size: 12px">{{ $crew['job'] }}</small>
                            </p>
                        @else
                            @break
                        @endif
                    @endforeach
                </div>

                <div class="mt-10">
                    <hr>
                    <div class="mt-4" x-data="{ isOpen: false }">
                        @if (count($movie['videos']['results']) > 0)
                            <ul class="actions">
                                <li><a @click="isOpen=true" class="button big">Watch Trailer</a></li>
                            </ul>

                            <template x-if="isOpen">
                                <div
                                    style="background-color: rgba(0, 0, 0, .5);"
                                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto z-50"
                                >
                                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                        <div class="bg-gray-900 rounded">
                                            <div class="flex justify-end pr-4 pt-2">
                                                <button
                                                    @click="isOpen = false"
                                                    @keydown.escape.window="isOpen = false"
                                                    class="text-3xl leading-none hover:text-gray-300">&times;
                                                </button>
                                            </div> 
                                            <div class="modal-body px-8 py-8">
                                                <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                    <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        @endif
                    </div>
                </div>
                
            </div>
        </section>

        <hr>

        <div class="casts">
            <h2 class="text-3xl font-medium my-5">Casts</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-3">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($cast['profile_path'])
                        <div class="cast">
                            <span class="image object">
                                <img src="{{ 'https://image.tmdb.org/t/p/w200/'. $cast['profile_path'] }}" alt="{{ $cast['name'] }}" />
                            </span>
                            <h4 class="text-sm">{{ $cast['name'] }}
                                <small style="#7c7c7c;" class="block text-xs">{{ $cast['character'] }}</small>
                            </h4>
                            
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
                
            </div>
        </div>

        <hr class="my-8">

        <div class="screenshots">
            <h2 class="text-3xl font-medium my-5">Screenshots</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 4)
                        <div class="cast">
                            <span class="image object">
                                <img src="{{ 'https://image.tmdb.org/t/p/w300/'. $image['file_path'] }}" alt="{{ $movie['title'] }}" />
                            </span>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
                
            </div>
        </div>
    </div>
    
@endsection