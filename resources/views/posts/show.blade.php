@extends('layouts.app')

@section('content')
 <a href="/posts" class="btn btn-primary">Go Back</a>
  <h1>{{$post->title}}</h1>
   <div>
       {!!$post->body!!} {{-- instead of { here use !! to parse html--}}
   </div>
   <hr>
   <small>written on {{$post->created_at}}</small>
   <hr>
   <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
   <a href="/posts/{{$post->id}}/delete_custom" class="btn btn-danger">Delete</a>
@endsection