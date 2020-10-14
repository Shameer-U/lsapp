@extends('layouts.app')

@section('content')
      <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>This is a blog</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
     </div>


<!-- Testing Modal to see if it works -->
  {{-- <div class="col-md-9">
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#load_modal">
        Create New Complaint
    </button>
</div>

<div class="modal fade" id="load_modal" tabindex="-1" role="dialog" aria-labelledby="complaintModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="complaintModalLabel">Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <form  method="POST" action="" enctype="multipart/form-data" >
               <div class="modal-body">
                  It works
               </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-success">Save</button>
                </div>
            </form>
      </div>
  </div>
</div> --}}
<!--End Testing Modal -->
        
@endsection
    