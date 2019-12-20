@extends('blank')
@section('content')

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

@if(gettype($users)=="array")
@foreach($users as $user)
<hr>
<div class="header" style="margin-bottom:20px;">
<a href="{{ url('users/delete',[$user['id']]) }}" style="text-decoration:none;color:red;"><i class="fa fa-times" aria-hidden="true" style="display:flex;font-size:30px;"></i></a>
  <h2><a href="{{ url('users/view',[$user['id']]) }}" style="text-decoration:none;">{{ $user['name'] }}</a></h2>
</div>

@endforeach
@else

<h3>{{ $users }}</h3>
@endif

@stop