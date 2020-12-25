<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{    
    /**
     * __constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth")->except(['index']);
    }
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.bearer'))
                ->get(config('services.tmdb.url').'/movie/popular')
                ->json()['results'];
        
        $nowPlayingMovies = Http::withToken(config('services.tmdb.bearer'))
                ->get(config('services.tmdb.url').'/movie/now_playing')
                ->json()['results'];
        
        $genresArray = Http::withToken(config('services.tmdb.bearer'))
                ->get(config('services.tmdb.url').'/genre/movie/list')
                ->json()['genres'];

        $genres  = collect($genresArray)->mapWithKeys(function ($genre)
        {
            return [$genre['id'] => $genre['name']];
        });
                

        return view('pages.index', [
            'popularMovies' => $popularMovies,
            'nowPlayingMovies' => collect($nowPlayingMovies)->take(5),
            'genres' => $genres
        ]);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.bearer'))
                ->get(config('services.tmdb.url').'/movie/'.$id.'?append_to_response=credits,videos,images')
                ->json();

        
        $nowPlayingMovies = Http::withToken(config('services.tmdb.bearer'))
                ->get(config('services.tmdb.url').'/movie/now_playing')
                ->json()['results'];

        return view('pages.single', [
            'movie' => $movie,
            'nowPlayingMovies' => $nowPlayingMovies
        ]);
    }

    
    
    public function test()
    {
        return view('pages.test');
    }
}
