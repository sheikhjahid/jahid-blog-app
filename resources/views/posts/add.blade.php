@extends('blank')
@section('content')

@if(session()->has('error'))
<div class="alert alert-success">
    {{ session()->get('error') }}
</div>
@endif

<h3>Post Information</h3>
<div class="container">
  <form action="{{ url('posts/create') }}" method="POST" style="margin-bottom:20px;">
    @method('GET')
    <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Enter title..">

    <label for="subject">Description</label>
    <textarea id="body" name="body" placeholder="Write description" style="height:200px"></textarea>

    <input class="btn btn-primary" type="submit" value="Submit">
  </form>
</div>


@stop