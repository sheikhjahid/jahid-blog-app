@include('layouts.header')
<body>

    <div class="header">
    <h1>Jahid Blog</h1>
    <p>This is my blog</p>
    </div>
    <div class="navbar">
      <a href="{{ route('register') }}">Sign Up</a>
      <a href="{{ route('login') }}">Login</a>
    </div>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->
  <!-- aside -->
  <div class="container">
    @yield('content')
  </div>
<!-- ############ LAYOUT END-->

@include('layouts.footer')