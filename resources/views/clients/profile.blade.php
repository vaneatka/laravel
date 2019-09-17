@extends('public.layout')
@section('content')
    
<form action="{{route('logout')}}" method="post" class="mt-3">    
    <button> Logout </button>
    @csrf
</form>
@endsection

   
  