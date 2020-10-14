@extends('layouts.app')

@section('content')

  <h1>Posts</h1>
  @if(count($posts) > 0)
       @foreach($posts as $post)
           <div class="card card-body bg-light">
             <div class="row">
                  <div class="col-md-4 col-sm-4">
                     <img style="width:150px; height:150px;" src="storage/cover_images/{{$post->cover_image}}" alt="">
                  </div>
                  <div class="col-md-8 col-sm-8">
                     <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                     <small>written on {{$post->created_at}} by {{$post->user->name}}</small>{{-- accessing user through post because we added "relationship" between user and post--}}
                  </div>
             </div>
              
           </div>
       @endforeach
       {{$posts->links()}}
  @else
    <p>No posts found</p>
  @endif

@endsection