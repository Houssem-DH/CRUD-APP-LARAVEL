@extends('layouts.app')


@section('title')
    Register
@endsection



@section('content')
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-outline mb-4">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="text" id="form3Example1cg"
                                            class="form-control form-control-lg @error('full_name') is-invalid @enderror"
                                            name="full_name" value="{{ old('full_name') }}" required
                                            autocomplete="full_name" autofocus />
                                        <label class="form-label" for="form3Example1cg">Full Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="text" id="form3Example1cg"
                                            class="form-control form-control-lg @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" required autocomplete="username"
                                            autofocus />
                                        <label class="form-label" for="form3Example1cg">UserName</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <input type="email" id="form3Example1cg"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus />
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror



                                        <input type="password" id="form3Example1cg"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" value="{{ old('password') }}" required autocomplete="new-password"
                                        autofocus />
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password_confirmation" id="form3Example4cdg" class="form-control form-control-lg" required autocomplete="new-password" />
                                        <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    </div>



                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a
                                            href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
