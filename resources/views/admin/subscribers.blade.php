@extends('admin.layout')

@section('content')
<form action="{{route('admin.subscribeMany')}}" method="POST">
    <h3>Lista Email</h3>
    <button type="submit" class="btn btn-primary">Incarca Tabelul</button>
    <a  href="delete/subscribers" class="btn btn-warning">Empty Table</a>
    <a href="subscribers">Show All</a>
    @csrf
</form>

<table class="table mt-3">
  <thead>
    <tr> 
      <th>Nr.</th>
      <th scope="col">Email Name</th>
      <th scope="col">Created At</th>      
    </tr>
  </thead>
  
  <tbody>
    @foreach ($subscribers as $item)
    <tr>      
      <td> {{$item->id}}</td>
      <td> {{$item->email}}</td>
      <td> {{$item->created_at}}</td>     
    </tr>
    @endforeach
  </tbody>
</table>

{{$subscribers->links()}}


@endsection