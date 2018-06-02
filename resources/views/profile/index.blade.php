{{--  
    TODO:
    On upcoming races, add map when hovering to see location
  --}}

@extends('layouts.app')

@section('content')

<div id="profile-header">
    <h1>PROFILE IMAGE</h1>
</div>
<div class="thick-line"></div>

<div id="profile-info">
    <h3>Hello, {{ Auth::user()->name }}</h3>

    <h4><strong>Your upcoming races</strong></h4>
    @foreach($raceSignUps as $race)
        <li>{{($race->raceName)}}</li>
    @endforeach
    </div>
@endsection