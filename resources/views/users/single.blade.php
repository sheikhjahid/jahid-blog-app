@extends('blank')
@section('content')

@if(gettype($user)=="array")
<center>

  
  <div class="user-info" style="padding:107px; background-color:grey;border:1px solid; margin-bottom:20px;">
    <p><b>{{ $user['name'] }}</b></p>
    <p><b>{{ $user['email'] }}</b></p> 
    @if($user['is_admin']!=true)
    <p> <b>{{"Application User"}}</b> </p>
    @else
    <p> <b>  {{ "Administrator" }} </b> </p>
    @endif
  </div>
</center>
@else
<h3>{{ $user }}</h3>
@endif

@stop