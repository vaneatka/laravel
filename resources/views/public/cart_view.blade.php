@extends('public.layout')



@section('content')
<div class="container mt-3">
    <h3 class="h3">Hello dear Buyer with Cart_id : {{$cart->id}}</h3>

    <h4>Products in cart: {{$cart->items->count()}}</h4>

    <ol class="list-group row" >
        @foreach ($cartItems as $number => $item)
            <li class="list-group-item d-flex">
                <div class="col-sm-2 d-flex"><h5>{{$number +1}}</h5>  <img src="{{$item->product->image}}" class="ml-3" style="height:4rem" alt="{{$item->product->name}}"> </div>
                <div class="col-sm-6">{{$item->product->name}} </div>
                <div class="col-sm-1">{{$item->itemPrice->value}}</div>
                <div class="col-sm-1">{{$item->itemPrice->currency->code}}</div>
                <div class="col-sm-2">
                        <form action="{{route('home')}}/cart/remove/{{$item->id}}"  method="post" class="form-inline p-1"> 
                            @method('delete')
                            @csrf                              
                            <button type="submit" class="btn primary">Remove</button>
                        </form>           
                </div>
            </li>
        @endforeach
    </ol>  
<h4 class="mt-3">Total Cart Price: {{$cart->totalPrice->value}} {{$cart->totalPrice->currency->code}}</h4>
    
<a href="{{route('home')}}/cart/checkout">Push me baby one more time!</a>

</div>

@endsection
