@extends('blank')
@section('content')

@if(session()->has('error'))
<div class="alert alert-success">
    {{ session()->get('error') }}
</div>
@endif

@if(gettype($post)=="array")
<h3>Update : {{ ucfirst($post['title']) }}</h3>
<hr>
<div class="container">
  <form action="{{ url('posts/update',[$post['id']]) }}" method="POST" style="margin-bottom:20px;">
    @method('GET')
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ $post['title'] }}" placeholder="Enter title..">

    <label for="subject">Description</label>
    <textarea id="body" name="body"placeholder="Write description" style="height:200px">{{ $post['body'] }}</textarea>

    <input class="btn btn-primary" type="submit" value="Submit">
  </form>
</div>

@else
<h3> {{ $post }} </h3>
@endif


@stop