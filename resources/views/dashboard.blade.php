@extends('blank')
@section('content')



  <div class="profile">
    <center>
    <h2>About Me</h2>
    <h5>Photo of me:</h5>
    <div class="profile-data"><img src="{{ URL::asset('images/jahid.jpg') }}"></div>
    <p>Hii guys , myself Jahid..</p>
    </center>
  </div>
  
  <hr>
  
  <div class="main">
  <h1> Posts 
  @if(gettype($posts)=="array")
  <span class="badge">{{ count($posts) }}</span>
  @endif
  </h1><a style="display:flex;" href="{{ url('posts/list') }}">See all</a>
  <h3>Showing latest 4 posts</h3>
  <hr>
  <div class="row">

    @if(gettype($posts)=="array")

    @foreach(array_slice($posts, 0, 4, true) as $post)
    <div class="post-content" style="margin-top:20px;">
    <div class="column" style="border: 1px solid cyan; margin-right:20px; margin-bottom:20px;">
    <div class="card box bg-white shadow">
    <a href="#" style="text-decoration: none;">
    <h3 class="project-title">{{ $post['title']}}</h3></a> 
    <div style="color: grey;">{{ $post['body'] }}</div></div>
    </div>
    </div>
    @endforeach
    @else
    <h3> {{ $posts }} </h3>
    @endif
    </div>

  </div>
  
  
  
  <div class="main">
  <h1> Users 
  @if(gettype($users)=="array")
  <span class="badge">{{ count($users) }}</span>
  @endif
  </h1>
  <a style="display:flex;" href="{{ url('users/list') }}">See all</a>
  <h3>Showing latest 4 posts</h3>
  <hr>
    @if(gettype($users)=="array")
    @foreach(array_slice($users, 0, 4, true) as $user)
    <div class="post-data">
    <h5>{{ $user['name']}}</h5>
    </div>
    <hr>
    @endforeach
    @else
    <h3>{{ $users }}</h3>
    @endif
  </div>



@stop

