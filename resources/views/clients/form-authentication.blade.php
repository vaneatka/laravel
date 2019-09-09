<div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
<form method="POST" action="{{route('login')}}">
        @error('email')
           {{$message}} 
        @enderror
        <div class="form-group w-50">
            <label for="email">Email address</label>
            <input type="emailInput" name="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email">            
        </div>
        @error('password')
        {{$message}} 
        @enderror
        <div class="form-group w-50">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="checkRemember">
            <label class="form-check-label" for="checkRemember">Remember Me</label>
        </div>
        @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>