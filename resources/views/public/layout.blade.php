<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        @if (isset($cart))   
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ $cartItems->count() }} Items in cart. Total Price : {{ $cart->totalPrice->value . ' ' . $cart->totalPrice->currency->code }}
            </button>
            <div class="dropdown-menu w-100"> 
                <ol class="list-group  list-group-flush">
                    @foreach ($cartItems as $num =>$item)
                    <li class="list-group-item">
                        <form action="{{route('home')}}/cart/remove/{{$item->id}}"  method="post" class="form-inline p-1">                    
                            <a class="dropdown-item form-control" href="#"> {{$num + 1}} {{$item->product->name}} {{$item->itemPrice->value ?? 0}} </a>                    
                            @method('delete')
                            @csrf                              
                            <button type="submit" class="btn btn-sm primary ml-auto">Remove</button>
                        </form>                        
                    </li>
                    @endforeach
                    
                </ol> 
                <a href="{{ route('home') }}/cart/view" class="btn btn-default ml-auto">View Cart</a>   
            </div>
        </div>
        @else
         <div class="btn-group">
           Cart empty
        </div>
        @endif($)            

        {{-- <div id="example"></div> --}}
        
        


        @include('public.navbar')
        @yield('content')
    </div>
    




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- <script src="{{route('home')}}/js/app.js"></script> --}}
</body>
</html>