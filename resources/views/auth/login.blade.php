@extends('layouts.app')

@section('title')
    Login
@endsection


@section('content')
<br><br><br><br><br><br><br>

<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="{{ route('login') }}" class="signin-form">
                @csrf
           
  
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control form-control-lg @error('email') is-invalid @enderror"
              name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address" />
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
              <label class="form-label" for="form3Example3">Email address</label>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" class="form-control form-control-lg @error('password') is-invalid @enderror"
              name="password" required autocomplete="current-password" placeholder="Password" />

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

              <label class="form-label" for="form3Example4">Password</label>
            </div>
  
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2"  id="remember" type="checkbox" name="remember" id="form2Example3" checked/>
                
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              @if (Route::has('password.request'))
              <a href="/login#" class="text-body">Forgot password?</a>
              @endif
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('register')}}"
                  class="link-danger">Register</a></p>
            </div>
  
          </form>
        </div>
      </div>
    </div>
   
      <!-- Right -->
    </div>
  </section>
@endsection
