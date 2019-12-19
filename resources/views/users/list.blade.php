@extends('blank')
@section('content')

@if(gettype($users)=="array")
@foreach($users as $user)
<hr>
<div class="header">
  <h2>{{ $user['name'] }}</h2>
</div>

@endforeach
@else

<h3>{{ $users }}</h3>
@endif

@stop