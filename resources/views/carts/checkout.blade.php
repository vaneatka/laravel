@extends('public.layout')

@section('content')
    
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">

  @include('clients.form-authentication')
  @include('clients.form-registration')
 

</div>

@endsection