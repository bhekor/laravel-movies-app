<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nowPlayingMovies = Http::withToken(config('services.tmdb.bearer'))
                ->get(config('services.tmdb.url').'/movie/now_playing')
                ->json()['results'];
        return view('home', [
            'nowPlayingMovies' => collect($nowPlayingMovies)->take(1),
        ]);
    }
}
