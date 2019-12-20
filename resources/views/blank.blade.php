@include('layouts.header')
<body>

    <div class="header">
    <h1>Jahid Blog</h1>
    <p>This is my blog</p>
    </div>
    <div class="navbar">
      <a href="{{ url('dashboard') }}" class="{{ request()->is('dashboard') ? 'active':'' }}">Dashboard</a>
      <a href="{{ url('users/list') }}" class="{{ request()->is('users/list') ? 'active':'' }}">Users</a>
      <a href="{{ url('posts/list') }}" class="{{ request()->is('posts/list') ? 'active':'' }}">Posts</a>
      <a href="{{ url('logout') }}" class="right"><i class="fa fa-sign-out"></i></a>
    </div>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
  <!-- aside -->
  <div class="container">
    @yield('content')
  </div>
<!-- ############ LAYOUT END-->

@include('layouts.footer')