@extends('admin.layout')

@section('content')
<h4>Edit the {{$edited->name}} category.</h4>
<form action="{{route("categories.update" , ['id' => $edited->id ])}}" method="POST">
    @method('PATCH')
    <div class="form-group">
        <label for="name_change">Change Category Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="name_change">
    </div>
    <div class="form_group">
        <label for="parent_select">Choose Parent Category for selected</label>
        <select name="parent" id="parent_select">
            <option selected>-------</option>
            @foreach ($categories as $item)
            <option value="{{$item->name}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form_group">
        <label for="child_select">Choose Child Category for selected</label>
        <select name="children" id="child_select">
            <option selected>-------</option>
            @foreach ($categories as $item)
            <option value="{{$item->name}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  @csrf
</form>
@endsection