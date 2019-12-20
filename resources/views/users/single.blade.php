@extends('blank')
@section('content')

@if(gettype($user)=="array")

<div class="row" style="margin-bottom:20px;">
  <div class="column" style="padding:107px; background-color:grey;border:1px solid;">
  <div class="profile-data"><img src="{{ URL::asset('images/jahid.jpg') }}"></div>
  </div>
  <div class="column" style="padding:107px;">
        <p> 
            <b>{{ $user['name'] }}</b> 
        </p>
        <p> 
            <b>{{ $user['email'] }}</b> 
        </p>
  </div>
</div>

@else
<h3>{{ $user }}</h3>
@endif

@stop