@extends('layouts.app')

@section('title', 'Welcome LMovies Site!')

@section('content')

    <!-- Banner -->
        <section id="banner">
            <div class="content">
                <header class="mb-4">
                    <h1 class="font-bolder text-5xl py-4 mb-3">Welcome, LMovies<br />
                    by Bhekor</h1>
                    <p>A cheap subscription based movies streaming site</p>
                </header>
                <p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. Pellentesque sapien ac quam. Lorem ipsum dolor sit nullam.</p>
                <ul class="actions mt-4">
                    <li><a href="#" class="button big">Learn More</a></li>
                </ul>
            </div>
            <span class="image object">
                <img src="{{ asset('images/pic10.jpg') }}" alt="" />
            </span>
        </section>

    <!-- Section -->
        <section>
            <header class="major">
                <h2 class="text-2xl font-medium">Popular Movies</h2>
            </header>
            <div class="posts">
                 @foreach ($popularMovies as $pmovie)
                     <article>
                        <a href="{{ route('show', $pmovie['id']) }}" class="image">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $pmovie['poster_path'] }}" alt="{{ $pmovie['title'] }}" />
                        </a>
                        <h3 class="font-bold text-lg mb-2">{{ $pmovie['title'] }}</h3>
                        <div>
                            <p>
                                <strong>Release Date:</strong> {{ \Carbon\Carbon::parse($pmovie['release_date'])->format('M d, Y') }} <br>

                                <strong>Rating:</strong> {{ $pmovie['vote_average'] * 10 . '%' }} <br>

                                <strong>Genres:</strong> 
                                @foreach ($pmovie['genre_ids'] as $genre)
                                {{ $genres->get($genre) }}@if (!$loop->last),@endif
                                @endforeach
                            </p>
                        </div>
                        <ul class="actions mt-4">
                            <li><a href="{{ route('show', $pmovie['id']) }}" class="button">Watch Now!</a></li>
                        </ul>
                    </article>
                 @endforeach
                
            </div>
        </section>

@endsection