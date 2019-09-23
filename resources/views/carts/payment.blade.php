@extends('public.layout')

@push('styles')
<link rel="stylesheet" href="{{asset('css/stripe.css')}}">    
@endpush
    
    @section('content')

        @isset($message)
            <h2>{{$message}}</h2>            
        @endisset
    
    You are going to buy:
    
    <ul class="list-group">
        @foreach ($cart->items as $item)
        <li class="list-group-item w-25 d-flex"><div class="mr-auto">{{$item->product->name}}</div>  <div class="ml-auto">{{$item->product->prices->first()->value}} {{$item->product->prices->first()->currency->code}}</div> </li>            
        @endforeach
    </ul>
       
    Total cart price : {{$cart->totalPrice->value}} {{$item->product->prices->first()->currency->code}}
    <form action="{{route('home')}}/cart/charge" method="post" id="payment-form"  class="mt-3">
        <div class="form-group">
                <label for="card-element">
                    Submit your credit card
                </label>
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
                
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
            @csrf
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
        
        @endsection

        @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{asset('js/stripe.js')}}"></script>            
        @endpush
 