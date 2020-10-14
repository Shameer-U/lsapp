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
   @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <div class="row">
            <div class="col-md-6">
               <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
            </div>
            <div class="col-md-6">
                <form action="{{ url('posts/'.$post->id) }}" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="_method" value="DELETE">{{-- method spoofing, changing POST method to DELETE --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">{{-- CSRF token --}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @endif
   @endif
@endsection