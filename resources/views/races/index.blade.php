@extends('layouts.app');

@section('content')
    @foreach($races as $race)
        <li><a href="races/show/{{$race->raceID}}">{{ $race->raceName }}</a></li>
    @endforeach
@endsection