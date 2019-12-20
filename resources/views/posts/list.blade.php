@extends('blank')
@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<a href="{{ url('posts/add') }}"><button class="btn btn-danger">Add</button></a>
@if(gettype($posts)=="array")

@foreach($posts as $post)
<hr>
<div class="header">
   <a href="{{ url('posts/delete',[$post['id']]) }}" style="text-decoration:none;color:red;"><i class="fa fa-times" aria-hidden="true" style="display:flex;font-size:30px;"></i></a>
  <h2><a href="{{ url('posts/view',[$post['id']]) }}" style="text-decoration:none;color:white;">{{ $post['title'] }}</a>  </h2>
</div>

<div class="row">
    <div class="leftcolumn">
        <div class="card">
        <h5>{{ date('F jS Y', strtotime($post['created_at'])) }}</h5>
        <p><h2>{{ str_limit($post['body'],20) }}</h2></p>
        </div>
    </div>
</div>
@endforeach
@else

<h3>{{ $posts }}</h3>
@endif

@stop