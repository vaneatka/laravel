@extends('admin.layout')

@section('content')
<h3>Lista Categoriilor</h3>
@foreach ($categories as $item)
    <p>{{$item->name}}</p>
@endforeach
@endsection