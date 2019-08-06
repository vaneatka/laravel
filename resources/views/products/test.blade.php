{{-- {{dd($products)}} --}}
<div class="container">

    <ol class="list-group" >
        @foreach ($products as $item)
        <li class= 'list-group-item'>
            <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{$item->image->first()}}" alt="{{$item->name}}">
                    <div class="card-body">
                        <h3 class="card-title">{{$item->name}}</h3>                      
                    </div>                    
                    <div class="card-body">
                        <h3>Price</h3>
                        <h4>{{$item->price->value}}, {{$item->price->currency->code}}</h4>
                    </div>
                </div>
                
            </li>
            @endforeach
        </ol>
    </div>