@extends('layouts.app')
@section('title')
    My Posts
@endsection
@section('content')
@if (session('status'))
        <script>
            swal("", "{{ session('status') }}", "success");
        </script>
    @endif

<br><br><br><br><br><br>





<div class="card container">

    <div class="card-header">
        <h4>My Posts</h4>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>State</th>
                    

                    <th>action</th>


                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $item)
                    <tr>

                        <td>{{ $item->id }}</td>
                       
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








                        @if($item->state==0)
                        
                        <td>Pending</td>
                      
                        @endif

                        @if($item->state==1)
                        
                        <td>Rejected</td>
                      
                        @endif

                        @if($item->state==2)
                        
                        <td>Accepted</td>
                      
                        @endif
                        
                            <td><a href="edit-post/{{ $item->id }} "  class="btn btn-primary" >Edit</a>
                                <a href="delete-post/{{ $item->id }}" class="btn btn-danger">Delete</a>
                            </td>

                         
                                
                           
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>

    <br><br>


@endsection
