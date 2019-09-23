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
    <div class="col-lg-10 d-flex flex-column align-items-center justify-content-center p-5">
        <h1>Welcome to the Candy's Shop</h1>        
        <div class="border border-primary rounded-lg"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e5/Soviet_jars.jpg" alt="banca" class="img-fluid"></div>
    </div>
</div>

@endsection
