@extends('layouts.app')

@section('content')
<h2>UPCOMING RACE CAROUSEL deploy test</h2>
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
