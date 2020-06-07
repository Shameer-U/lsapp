<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/">LSAPP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/services') }}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts">Blog</a>
          </li>
       
      </ul>
      <ul class="navbar-nav">

        @if (empty(session('id')))
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/users') }}">Login</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/users/logout') }}">Logout</a>
          </li>
        @endif
       
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/login/create') }}">Create Post</a>
        </li>
      </ul>
      
    </div>
  </nav>