@extends('blank')
@section('content')

<a href="{{ url('posts/add') }}"><button class="btn btn-danger">Add</button></a>
@if(gettype($posts)=="array")

@foreach($posts as $post)
<hr>
<div class="header">
  <h2>{{ $post['title'] }}</h2>
</div>

<div class="row">
    <div class="leftcolumn">
        <div class="card">
        <h5>{{ date('F jS Y', strtotime($post['created_at'])) }}</h5>
        <p>Description</p>
        <p><h2>{{ $post['body'] }}</h2></p>
        </div>
    </div>
</div>
@endforeach
@else

<h3>{{ $posts }}</h3>
@endif

@stop