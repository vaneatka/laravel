@extends('public.layout')

@php
 


    // dd($cat);
@endphp
@section('content')

<div id="accordion">

  @foreach ($cat as $item)      
  <div class="card">
  <div class="card-header" id="heading{{$item->id}}">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
          {{$item->name}}
        </button>
      </h5>
    </div>
    @foreach ($item->children as $child)        
    <div id="collapse{{$item->id}}" class="collapse show" aria-labelledby="heading{{$item->id}}" data-parent="#accordion">
      <div class="card-body">
        {{$child->name}}
      </div>
    </div>
    @endforeach
  </div>  
  @endforeach
</div>
@endsection