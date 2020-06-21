@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
       <h3>Dashboard</h3>
    </div>
  <div class="row">
      <div class="col-md-8 offset-md-2">
           <div class="card card-default">
               <div class="card-body">
                   <a href="/posts/create" class="btn btn-primary">Create Post</a>
                   <h4>Your Blog Posts</h4>
                   @if(count($posts) > 0)
                       <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td><a href="/posts/{{$post->id}}/delete_custom" class="btn btn-danger">Delete</a></td>
                                </tr> 
                            @endforeach
                        </table>
                    @else
                       <p>You have no posts</p>
                    @endif
                </div>

           </div>
      </div>
  </div>
   
</div>  
@endsection