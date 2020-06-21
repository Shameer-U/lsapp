@extends('layouts.app')

@section('content')
  <h1>Posts</h1>
  @if(count($posts) > 0)
       @foreach($posts as $post)
           <div class="card card-body bg-light">
              <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
           <small>written on {{$post->created_at}} by {{$post->user->name}}{{-- accessing user through post because we added "relationship" between user and post--}}</small>
           </div>
       @endforeach
       {{$posts->links()}}
  @else
  @endif
@endsection