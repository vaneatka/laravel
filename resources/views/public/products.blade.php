@extends('public.layout')



@section('content')
    

<div class="row p-1 d-flex justify-content-end">

    <div class="col-lg-2">
        <a href="{{ route('home') }}/catalog/date/newest">Ascendent Date</a>
    </div>
    <div class="col-lg-2">
        <a href="{{ route('home') }}/catalog/date/oldest">Descendent Date</a>            
    </div>
    <div class="col-lg-2">
        <a href="{{ route('home') }}/catalog/price/cheap">Ascendent Price</a>
    </div>
    <div class="col-lg-2">
        <a href="{{ route('home') }}/catalog/price/expensive">Descendent Price</a>            
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
                <a href="{{ route('home') }}/cart/add/{{$product->id}}" class="btn btn-primary">Buy {{$product->prices->first()->value}} {{$product->prices->first()->currency->code}}</a>
            </div>
            </div>            
        </div>
        
        
        @endforeach
    </div>
</div>
{{$products->links()}};

    

@endsection
