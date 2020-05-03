@extends('layouts.app')

@section('content')
 <a href="/posts" class="btn btn-primary">Go Back</a>
  <h1>{{$post->title}}</h1>
   <div>
       {!!$post->body!!} {{-- instead of { here use !! to parse html--}}
   </div>
   <hr>
   <small>written on {{$post->created_at}}</small>
@endsection