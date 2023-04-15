@extends('layouts.app')
@section('title')
   My profile
@endsection
@section('content')
    
    @if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif

    <br>
    <br>
    <br>

    <div class="container">


        <div class="card container">

            <div class="card-header">
                <h4>My Profile</h4>
            </div>

            <div class="card-body">



                <div class="row">


                    <form method="POST" action="{{ url('edit-profile/' . Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-outline">
                            <label class="form-label" for="">Full Name</label>
                            <input type="text" class="form-control" name="full_name"
                                value="{{ Auth::user()->full_name }}">

                        </div>
                        <br>


                        <br>

                        <div class="form-outline mt-3">
                            <label class="form-label" for="">UserName</label>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ Auth::user()->username }}" readonly>

                        </div>
                        <br>

                        <div class="form-outline mt-3">
                            <label class="form-label" for="">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ Auth::user()->email }}" readonly>

                        </div>
                        <br>

                        <div class="form-outline">
                            <label class="form-label" for="">Profile Picture</label>
                        
                            <br>
                            <img src="assets/uploads/user/{{ Auth::user()->image }}" alt="user" class="rounded-circle"
                                width="70" />
                                <hr>

                            <input type="file" class="form-control" name="image">


                        </div>





                        <div class="col-md-12 mt-5">
                            <button type="submit" class="btn btn-primary mr-2" style="text-align:center">
                                Validate
                            </button>
                        </div>

                    </form>






                </div>
            </div>









        </div>
        <br><br>
    @endsection
