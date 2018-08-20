@extends('layouts.app')

@section('content')
{{-- <div id="app">
    <h2>All Races</h2>
    <ul>
        <li v-for="race in races">
            <input type="checkbox" v-model="race.signedUp" />
            @{{race.name}}
        </li>
    </ul>

    <h2>Signed Up Races</h2>
    <ul>
        <li v-for="race in signedUpRaces" v-text="race.name"></li>
    </ul>

    <h2>Not Signed Up Races</h2>
    <ul>
        <li v-for="race in notSignedUpRaces" v-text="race.name"></li>
    </ul>
</div> --}}
<h2>UPCOMING RACE CAROUSEL</h2>
<h2>UPCOMING RACE LIST</h2>
<h3>MTB RACES | ROAD RACES</h3>
<h3>MTB RACE MAP | ROAD RACE MAP</h3>

<div class="row">
    <div class="col-md-6 col-lg-6">
        <div id="mtbMap" class="circle-map"></div>
    </div>

    <div class="col-md-6 col-lg-6">
        <div id="roadMap" class="circle-map"></div>
    </div>
</div>
@endsection
