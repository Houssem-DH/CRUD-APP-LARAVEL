@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        #imgg {
            border-radius: 50%;
        }


        #clickableAwesomeFont {
            cursor: pointer
        }
    </style>


    <br><br><br><br><br>
    <!-- Button trigger modal -->

    @if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif



    @if (Auth::user())
        @if (Auth::user()->role == 0)
            <div class="text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Create Post
                </button>
            </div>
            <br><br>






            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Create Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="container">
                                <div class="row">

                                    <div class="col-md-8 col-md-offset-2">



                                        <form action="{{ route('create-post') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="title">Title <span class="require">*</span></label>
                                                <input type="text" class="form-control" name="title" />
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description *</label>
                                                <textarea rows="5" class="form-control" name="description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <p><span class="require">*</span> required fields</p>
                                            </div>




                                    </div>

                                </div>
                            </div>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endif







    @foreach ($posts as $item)
        <div class="card border-dark mb-3 mx-auto" style="max-width: 50rem;">
            <div class="card-header">
                <img id="imgg" src="assets/uploads/user/{{ $item->user->image }}" width="40" />
                {{ $item->user->full_name }}
                @if (Auth::check())
                    @if ($item->user_id == Auth::user()->id)
                        <div class="dropdown" style="float: right">
                            <span id='clickableAwesomeFont' id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> <i class="fa fa-ellipsis-v fa-2x "></i> </span>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="edit-post/{{ $item->id }}">Edit</a>
                                <a class="dropdown-item" href="delete-post/{{ $item->id }}">Delete</a>

                            </div>
                        </div>
                    @endif
                @endif



                <p class="mr-4" style="float: right">{{ $item->created_at->diffForHumans() }}</p>









            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $item->title }}</h4>
                <p class="card-text">{{ $item->description }}.</p>
            </div>


        </div>
        <br>
        <br><br>
    @endforeach

@endsection
