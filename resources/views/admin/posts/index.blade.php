@extends('.admin.layouts.admin')


@section('title')
    Pendings Posts
@endsection

@section('content')
    <br>
    <br>
    @if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif


    <div class="card container">

        <div class="card-header">
            <h4>Pendings Posts</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->full_name }}</td>
                            <td>{{ $item->title }}</td>


                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                View
                            </button></td>




 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLongTitle">Description</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">

             <div class="container">
                 <div class="row">

                     <div class="col-md-8 col-md-offset-2">



<p>{{ $item->description }}</p>



                     </div>

                 </div>
             </div>




         </div>
         
        
     </div>
 </div>
</div>












                            <form method="POST" action=" {{ url('accept-post/' . $item->id) }} " enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td><button type="submit" class="btn btn-primary">Accept</button></td>
                            </form>


                            <form method="POST" action=" {{ url('reject-post/' . $item->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <td><button type="submit" class="btn btn-danger">Reject</button></td>
                            </form>

                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
