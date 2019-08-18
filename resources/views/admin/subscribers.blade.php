@extends('admin.layout')

@section('content')
<table class="table">
  <thead>
    <tr> 
      <th>Nr.</th>
      <th scope="col">Email Name</th>
      <th scope="col">Created At</th>      
    </tr>
  </thead>
  
  <tbody>
    @foreach ($subscribers as $num=>$item)
    <tr>      
      <td> {{$num+1}}</td>
      <td> {{$item->email}}</td>
      <td> {{$item->created_at}}</td>     
    </tr>
    @endforeach
  </tbody>
</table>

{{$subscribers->links()}}

@endsection