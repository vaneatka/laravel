@extends('public.layout')



@section('content')
    

<div class="row p-1 d-flex justify-content-end">

    <div class="col-lg-2">
        <a href="/public/catalog/date/cheap">Ascendent Date</a>
    </div>
    <div class="col-lg-2">
        <a href="/public/catalog/date/expensive">Descendent Date</a>            
    </div>
    <div class="col-lg-2">
        <a href="/public/catalog/price/cheap">Ascendent Price</a>
    </div>
    <div class="col-lg-2">
        <a href="/public/catalog/price/expensive">Descendent Price</a>            
    </div>
</div>
<div class="d-flex p-3">

    <div class="row">
            @foreach ($products as $product)
        <div class="col-sm-4">
           <div class="card" style="width: 18rem;">
            <img src="{{$product->image}}" class="card-img-top" alt="{{$product->name}}">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>                
                <a href="product/{{$product->id}}" class="btn btn-primary">Buy {{$product->value}}</a>
            </div>
            </div>            
        </div>
        
        
        @endforeach
    </div>
</div>

    

@endsection
