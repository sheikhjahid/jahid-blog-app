@extends('blank')
@section('content')


@if(gettype($post)=="array")

<div class="card">
  <h1>{{ $post['title'] }} <a href="{{ url('posts/edit',[$post['id']]) }}"> <i class="fa fa-pencil"></i></a></h1> 
  <h4>Posted on : {{ date('F jS Y', strtotime($post['created_at'])) }}</h4>
  <hr>
  <p><b>{{ ucfirst($post['body']) }}<b></p>
</div>
@else
<h3>{{ $post }}</h3>
@endif

@stop