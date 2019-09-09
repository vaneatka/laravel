  {{Auth::id()}}
  <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
  <form action="{{route('register')}}" method="POST">
    @csrf
  <h3>Registration</h3>
  <div class="form-group">
    <label for="emailRegistration">Email address</label>
    <input type="email" name="email" class="form-control" id="emailRegistration" placeholder="name@example.com">
  </div>
  @error('email')
    {{$message}}
  @enderror
  <div class="form-group">
    <label for="nameRegistration">Name</label>
    <input type="text" name="name" class="form-control" id="nameRegistration" placeholder="Indiana Johns">
  </div>
  @error('name')
      {{$message}}
    @enderror
  <div class="form-group">
    <label for="passRegistration">Password</label>
    <input type="password" name="password" class="form-control" id="passRegistration" placeholder="your super pass">
  </div>
  <div class="form-group">
    <label for="passConfirmation">Password Confirm</label>
    <input type="password" name="password_confirmation" class="form-control" id="passConfirmation" placeholder="your super pass again">
  </div>
    @error('password')
      {{$message}}
    @enderror
  <div class="form-check">
            <input type="checkbox" class="form-check-input" id="checkRegister">
            <label class="form-check-label" for="checkRegister">Yes, i sell my soul for nothing</label>
        </div>
<button type="submit" class="btn btn-primary">Register me</button>
  
</form>
  </div>