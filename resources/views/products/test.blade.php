<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<div class="container">

<ol class="list-group d-flex flex-row" >
    @foreach ($products as $item)
    <li class= 'list-group-item ' style='width:20%;'>
        <div class="card h-100" >
                <img class="card-img-top" src="{{$item->image->first()}}" alt="{{$item->name}}">
                <div class="card-body">
                    <h3 class="card-title">{{$item->name}}</h3>                      
                </div>                    
                <div class="card-body align-self-end mh-20 mp-3">
                    <h3>Price</h3>
                    <h4>{{$item->price->value}}, {{$item->price->currency->code}}</h4>
                </div>
                
            </div>
            
        </li>
        @endforeach
    </ol>
</div>
</body>
</html>


