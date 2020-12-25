@extends('layouts.app')

@section('title', 'Subscription Plans')

@section('content')
<div class="pricing">
    <!-- plan start -->
    <div class="">
        <div class="plan text-center">
            <span class="plan-name">Basic <small>Daily plan</small></span>
            <p class="plan-price"><sup class="currency">$</sup><strong>500</strong><sub>.00</sub></p>
            <ul class="list-unstyled">
                <li>100GB Monthly Bandwidth</li>
                <li>100 Domain Hosting</li>
                <li>24/7 Live Support</li>
            </ul>
            <a class="btn btn-primary" href="#.">Subscribe Now</a>
        </div>
    </div><!-- plan end -->
    <div class="">
        <div class="plan featured text-center">
            <span class="plan-name">Monthly Plan <small>Recommended</small></span>
            <p class="plan-price"><sup class="currency">$</sup><strong>1000</strong><sub>.00</sub></p>
            <ul class="list-unstyled">
                <li>100GB Monthly Bandwidth</li>
                <li>$100 Google AdWords</li>
                <li>100 Domain Hosting</li>
                <li>SSL Shopping Cart</li>
                <li>24/7 Live Support</li>
            </ul>
            <a class="btn btn-primary" href="#.">Subscribe Now</a>
        </div>
    </div><!-- plan end -->
    <div class="">
        <div class="plan text-center">
            <span class="plan-name">Yearly Plan <small>Family Plan</small></span>
            <p class="plan-price"><sup class="currency">$</sup><strong>2000</strong><sub>.00</sub></p>
            <ul class="list-unstyled">
                <li>100GB Monthly Bandwidth</li>
                <li>$100 Google AdWords</li>
                <li>100 Domain Hosting</li>
                <li>SSL Shopping Cart</li>
                <li>24/7 Live Support</li>
            </ul>
            <a class="btn btn-primary" href="#.">Subscribe Now</a>
        </div>
    </div><!-- plan end -->
</div>
@endsection