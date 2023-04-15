@extends('layouts.app')
@section('title')
    Search
@endsection
@section('content')
@if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif

<br><br><br><br>



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



    <br><br>


@endsection