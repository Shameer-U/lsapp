@extends('layouts.app')

@section('content')
 <a href="/posts" class="btn btn-primary">Go Back</a>
  <h1>{{$post->title}}</h1>
   <img style="width:400px; height:400px;" src="{{ URL::to('storage/cover_images/'.$post->cover_image)}}" alt="">
   <div>
       {!!$post->body!!} {{-- instead of { here use !! to parse html--}}
   </div>
   <hr>
   <small>written on {{$post->created_at}} by {{$post->user->name}}{{-- accessing user through post because we added "relationship" between user and post--}}</small>
   <hr>
   @if(!empty(session('id')))
        @if(session('id') == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
            <a href="/posts/{{$post->id}}/delete_custom" class="btn btn-danger">Delete</a>
        @endif
   @endif
@endsection