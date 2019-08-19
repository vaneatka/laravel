@extends('public.layout')

@section('content')
<form action="{{route('admin.subscribeMany')}}" method="POST">
    <h3>Vrei sa incarci tabelul cu mai multe inscrieri?</h3>
    <button type="submit" class="btn btn-primary">Incarca Tabelul</button>
    <a href="/laravel/public/admin/subscribers">Show All</a>
    @csrf
</form>
@endsection