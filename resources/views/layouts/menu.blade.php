<div id="sidebar">
    <div class="inner">

        <!-- Search -->
        <livewire:search-dialog>

        <!-- Menu -->
            <nav id="menu">
                <header class="major">
                    <h2>Menu</h2>
                </header>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="elements.html">Trending</a></li>
                    <li><a href="generic.html">Popular Movies</a></li>
                    <li><a href="#">TV Shows</a></li>
                    <li><a href="{{ route('plans') }}">Subscription Plans</a></li>
                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @endif
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                    @else
                        <li>
                            <a href="{{ route('home') }}">
                                <div class="flex py-1">
                                    <img src="https://via.placeholder.com/50x50" alt="{{ Auth::user()->name }}" class="rounded-full mr-2" />
                                <p class="pt-4 font-medium">{{ Auth::user()->name }}</p>
                                </div>
                                
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </nav>

        <!-- Section -->
            <section>
                <header class="major">
                    <h2>Now Playing</h2>
                </header>
                <div class="mini-posts">
                    @foreach ($nowPlayingMovies as $npmovies)
                        <article>
                            <a href="{{ route('show', $npmovies['id']) }}" class="image">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $npmovies['poster_path'] }}" alt="" />
                            </a>
                            <p>
                                <strong>Release Date:</strong> {{ \Carbon\Carbon::parse($npmovies['release_date'])->format('M d, Y') }} <br>
    
                                <strong>Rating:</strong> {{ $npmovies['vote_average'] * 10 . '%' }}
                            </p>
                        </article>
                    @endforeach
                </div>
                <ul class="actions mt-5">
                    <li><a href="#" class="button">More</a></li>
                </ul>
            </section>

        <!-- Section -->
            <section>
                <header class="major">
                    <h2>Get in touch</h2>
                </header>
                <p class="-mt-5">A technology enthusiast with over 7 years of experience in
                    programming (web, software, games, and robotics etc) and
                    passionate about solving real-world problems using every available
                    technology.</p>
                <ul class="contact mt-5">
                    <li class="icon solid fa-envelope"><a href="#">adeoluibidapo@gmail.com</a></li>
                    <li class="icon solid fa-phone">+234 903 488 4805</li>
                    <li class="icon solid fa-home">Somewhere in Abuja, Nigeria</li>
                </ul>
            </section>

        <!-- Footer -->
            <footer id="footer">
                <p class="copyright">&copy; Mufis - Bhekor. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
            </footer>

    </div>
</div>