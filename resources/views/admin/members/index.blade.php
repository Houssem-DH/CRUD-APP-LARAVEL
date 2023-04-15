@extends('.admin.layouts.admin')


@section('title')
    Members
@endsection

@section('content')
    @if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif
    



    <div class="card container">

        <div class="card-header">
            <h4>Members</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Role</th>

                        <th>action</th>


                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $item)
                        <tr>

                            <td>{{ $item->id }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if ($item->role == 0)
                                    User
                                @endif
                                @if ($item->role == 1)
                                    Admin
                                @endif

                            </td>

                            @if ($item->email != Auth::user()->email)
                                <td><button  class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Change Role</button>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Change Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-8 col-md-offset-2">
                        
                       
                        
                        <form action="edit-member/{{$item->id}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')

                            <div class="col-md-6 mb-3">
                                <label for="">Admin</label>
                                <input type="checkbox"  {{ $item->role==1 ? 'checked':'' }} name="role">
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















                                </td>


                                @if ($item->role == 0)
                                    <td><a href="{{ url('delete-member/' . $item->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $users->links() }}
    </div>
@endsection
