@extends('layouts.app')


@section('title')
    Edit Post
@endsection




@section('content')
@if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif

<br><br><br><br>

<div class="container">


    <div class="card container">

        <div class="card-header">
            <h4>Edit Post</h4>
        </div>

        <div class="card-body">



            <div class="row">


                <form method="POST" action="{{ url('update-post/' . $posts->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-outline">
                        <label class="form-label" for="">Title</label>
                        <input type="text" class="form-control" name="title"
                            value="{{ $posts->title }}">

                    </div>
                    <br>


                    <br>

                    

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="5" class="form-control" name="description">{{ $posts->description }}</textarea>
                    </div>
                    <br>

                
                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                       

                </form>






            </div>
        </div>









    </div>
    <br><br>


@endsection
