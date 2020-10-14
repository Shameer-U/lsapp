@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a  href="/posts/create" class="mb-2 btn btn-primary">Create Post</a>
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
                                    <td><form action="{{ url('posts/'.$post->id) }}" method="POST" enctype="multipart/form-data" >
                                            <input type="hidden" name="_method" value="DELETE">{{-- method spoofing, changing POST method to DELETE --}}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">{{-- CSRF token --}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                       </form>
                                   </td>
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
