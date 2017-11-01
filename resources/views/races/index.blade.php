@extends('layouts.app');

@section('content')
    @foreach($races as $race)
        <li><a href="races/{{$race->raceID}}">{{ $race->raceName }}</a></li>
    @endforeach
@endsection