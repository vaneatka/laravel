@extends('admin.layout')

@section('content')
<form action="categories" method="POST">
    <input type="text" name="name" placeholder="Category name" class="form-control">
    <input value="Add Button" type="submit" class="btn btn-primary">
    @csrf
</form>

<h3>Lista Categoriilor</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Parent Category</th>
      <th scope="col">Childern Category</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
</thead>
<tbody>
@foreach ($categories as $item)
    <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->parent}}</td>
        <td>{{$item->children}}</td>
        <td><a href="categories/{{$item->id}}/edit" class="btn btn-secondary">Edit</a></td>
        <td>
            <form action="categories/{{$item->id}}" method="POST">
                @method('DELETE')
                <button class="btn btn-default" type="submit" />Delete</button> 
                @csrf 
            </form>
        
        </td>
    </tr>   
    @endforeach
</tbody>
</table>    
@endsection