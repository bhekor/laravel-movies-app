@extends('layouts.testapp')

@section('title', 'Welcome LMovies Site!')

@section('content')

    <!-- Banner -->
        <section id="banner">
            <div class="content">
                <header>
                    <h1>Welcome, LMovies<br />
                    by Bhekor</h1>
                    <p>A cheap subscription based movies streaming site</p>
                </header>
                <p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. Pellentesque sapien ac quam. Lorem ipsum dolor sit nullam.</p>
                <ul class="actions">
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
                <h2>Popular Movies</h2>
            </header>
            <div class="posts">
            </div>
        </section>

@endsection