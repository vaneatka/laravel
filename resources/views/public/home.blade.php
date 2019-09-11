@extends('public.layout')



@section('content')
<div class="row mt-3">
    <div class="col-lg-2">

        <ul class="list-group">
            <li class="list-group-item"><a href="{{ route('home') }}"> Home </a></li>
            <li class="list-group-item"><a href="{{ route('home') }}/products"> Products </a></li>
            <li class="list-group-item"><a href="{{ route('home') }}/catalog">Catalogue</a></li> 
            <li class="list-group-item"><a href="{{ route('home') }}/subscribe">Subscribe</a></li> 
            <li class="list-group-item"><a href="{{ route('home') }}/cart/checkout">Checkout</a></li> 
            <li class="list-group-item"><a href="{{ route('home') }}/cart/view">Cart</a></li> 
            <li class="list-group-item"><a href="{{ route('home') }}/client/profile">Logout</a></li> 
        </ul>
        
    </div>
    <div class="col-lg-10 d-flex justify-content-center">
        <h1>HOME</h1>
    </div>
</div>

@endsection
