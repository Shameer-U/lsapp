@extends('layouts.app')

@section('content')
  <h1>Create Posts</h1>


  <form class="p-4"  action="{{ url('posts') }}" method="POST" > <!--"posts" points to "PostsController@store" ( to view use "php artisan route:list") -->
    {{--  it is always good to use url helper  {{ url('') }} --}}
    {{ csrf_field() }} {{-- without csrf field form wont submit --}}
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title"  placeholder="Title">
        </div>
        <div class="form-group">
            <label>Body</label>
            <input type="textarea" id="article-ckeditor" class="form-control" name="body"  placeholder="Body Text">
        </div>
        
        <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
</form>
  
@endsection