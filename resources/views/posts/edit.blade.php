@extends('layouts.app')

@section('content')
  <h1>Edit Posts</h1>


<form class="p-4"  action="{{ url('posts/'.$post->id) }}" method="POST" enctype="multipart/form-data" > <!-- to view each route pointing use "php artisan route:list" -->
    
          <input type="hidden" name="_method" value="PUT">{{-- method spoofing, changing POST method to PUT --}}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">{{-- CSRF token --}}
        <div class="form-group">
            <label>Title</label>
        <input type="text" class="form-control" name="title"  placeholder="Title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea type="textarea" id="article-ckeditor" class="form-control" name="body"  placeholder="Body Text" >
                {{$post->body}}
            </textarea> {{-- javascript version of "ckeditor" works only with "textarea" --}}
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control-file"  name="cover_image">
        </div>
        
        <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
</form>
  
@endsection