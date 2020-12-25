<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    /**
     * __constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth")->except(['plans']);
    }
    
    public function plans()
    {
        return view('pages.plans');
    }

    public function payment()
    {
        $nowPlayingMovies = Http::withToken(config('services.tmdb.bearer'))
                ->get(config('services.tmdb.url').'/movie/now_playing')
                ->json()['results'];

        $availablePlans = [
            'price_1HqcxPGsRSEUKkZIn10Ufjx9' => 'Daily ($500)',
            'price_1HqcxPGsRSEUKkZIUvtCJy4p' => 'Monthly ($1,000)',
            'price_1HqcxQGsRSEUKkZIOIilw5J5' => 'Yearly ($20,000)',
        ];

        $data = [
            'intent' => auth()->user()->createSetupIntent(),
            'nowPlayingMovies' => collect($nowPlayingMovies)->take(2),
            'availablePlans' => $availablePlans,
        ];

        return view('pages.payment')->with($data);
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $paymentMethod = $request->payment_method;
        $planId = $request->plan;

        $user->newSubscription('movies', $planId)->create($paymentMethod);

        return response([
            'success_url' => redirect()->intended('/')->getTargetUrl(),
            'message' => 'Payment Made! <br> Thanks for subcribing, enjoy unlimited streaming now!'
        ]);
    }
}
