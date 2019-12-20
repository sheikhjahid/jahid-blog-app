@extends('blank')
@section('content')

@if(gettype($users)=="array")
@foreach($users as $user)
<hr>
<div class="header">
  <h2><a href="{{ url('users/view',[$user['id']]) }}">{{ $user['name'] }}</a></h2>
</div>

@endforeach
@else

<h3>{{ $users }}</h3>
@endif

@stop