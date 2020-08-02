@extends('layouts.app')

@section('content')
  

<div class="row">
    <div class="offset-md-4 col-md-4">
        <h2 class="text-center">Login</h2>
        <form class="p-4"  action="{{ url('users/login') }}" method="POST" > 
            {{--  it is always good to use url helper  {{ url('') }} --}}
            {{ csrf_field() }} {{-- without csrf field form wont submit --}}
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email"  placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"  class="form-control" name="password"  placeholder="Enter password">
                </div>
                
                <button type="submit"  name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>  
@endsection