@extends('layouts.app')

@section('title', 'Your Profile')

@section('content')
<div class="">
    <!-- component -->
    <div class="w-full max-w-sm mt-10 mx-auto overflow-hidden rounded border bg-white shadow">
        <div class="relative">
            <div class="h-48 bg-cover bg-no-repeat bg-center"
                style="background-image: url(https://images.unsplash.com/photo-1524985069026-dd778a71c7b4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1051&q=80">
            </div>
            <div style="background-color: rgba(0,0,0,0.6)"
                class="absolute bottom-0 mb-2 ml-3 px-2 py-1 rounded text-sm text-white"> 
                @if (auth()->user()->subscribed('movies'))
                    Active
                @else
                    Not Active
                @endif
            </div>
            <div style="bottom: -20px;" class="absolute right-0 w-10 mr-2">
                <a href="#">
                <img class="rounded-full border-2 border-white" src="https://randomuser.me/api/portraits/women/17.jpg" >
                </a>
            </div>
        </div>
        <div class="p-3">
            <h3 class="mr-10 text-sm truncate-2nd">
                <a class="hover:text-blue-500" href="/huawwei-p20-pro-complete-set-with-box-a.7186128376">{{ auth()->user()->name }}</a>
            </h3>
            <div class="flex items-start justify-between">
                <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                <button class="outline text-xs text-gray-500 hover:text-blue-500 px-10" title="Bookmark this ad"><i class="fab fa-youtube"></i></button>
            </div>
            <p class="text-sm text-gray-500 block"><strong>Currently Plan:</strong> 
                @if (auth()->user()->subscribedToPlan('price_1HqcxPGsRSEUKkZIn10Ufjx9', 'movies'))
                    Daily - $500
                @elseif (auth()->user()->subscribedToPlan('price_1HqcxPGsRSEUKkZIUvtCJy4p', 'movies'))
                    Monthly - $1,000
                @elseif (auth()->user()->subscribedToPlan('price_1HqcxQGsRSEUKkZIOIilw5J5', 'movies'))
                    Yearly - $20,000
                @else 
                    No Plan
                @endif
            </p>
            <p class="text-xs text-gray-500"><a href="#" class="hover:underline hover:text-blue-500">username</a> • 2 days ago</p>

            <button class="outline text-xs text-gray-500 hover:text-blue-500 px-10 mt-5" title="Bookmark this ad"><i class="fa fa-times"></i> Cancel Subscription</button>
        </div>
  </div>
</div>
@endsection
