@extends('layouts.app')

@section('title', 'Payment')

@section('extra-top')
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 2.75rem;
            line-height: 2.75rem;
            padding: 10px 12px;
            border: solid 1px rgba(210, 215, 217, 0.75);
            border-radius: 4px;
            background-color: white;
            box-shadow: 0;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection

@section('content')
    <div class="login-card">

        <div class="card-body"> 
            <div class="card-header">{{ __('Make Payment') }}</div>

                <div class="form-group">
                    <label for="plan" class="col-md-4 col-form-label text-md-right">{{ __('Subscription Plans') }}</label>
    
                    <div class="col-md-6">
                        <select name="plan" id="subscription-plan" class="form-control pl-3" required>
                            <option value="price_1HqcxPGsRSEUKkZIn10Ufjx9">Daily</option>
                            <option value="price_1HqcxPGsRSEUKkZIUvtCJy4p">Monthly</option>
                            <option value="price_1HqcxQGsRSEUKkZIOIilw5J5">Yearly</option>
                        </select>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="card-holder-name" class="col-md-4 col-form-label text-md-right">{{ __('Card Holder Name') }}</label>
    
                    <div class="col-md-6">
                        <input id="card-holder-name" type="text" class="form-control" required autofocus>
                    </div>
                </div>

                <label for="card-number" class="col-md-4 col-form-label text-md-right">{{ __('Card Number') }}</label>
                <div class="mb-5 pt-3" id="card-element"></div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button id="card-button" data-secret="{{ $intent->client_secret }}" class="px-10 mr-3">
                            {{ __('Pay Now') }}
                        </button>
                    </div>
                </div>
        </div>
    </div>
@endsection


@section('extra-bottom')
    <script>

        window.addEventListener('load', function() {


            const stripe = Stripe('{{env('STRIPE_KEY')}}');

            const elements = stripe.elements();
            const cardElement = elements.create('card', {
                hidePostalCode: true,
            });

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;

            const plan = document.getElementById('subscription-plan').value;

            cardButton.addEventListener('click', async (e) => {
                const { setupIntent, error } = await stripe.handleCardSetup(
                    clientSecret, cardElement, {
                        payment_method_data: {
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );

                if (error) {
                    // Display "error.message" to the user...
                } else {
                    // The card has been verified successfully...
                    console.log('handling success', setupIntent.payment_method);

                    axios.post('/subscribe',{
                        payment_method: setupIntent.payment_method,
                        plan : plan,
                    }).then((data)=>{
                        location.replace(data.data.success_url)
                    });
                }
            });
        });

    </script>
@endsection