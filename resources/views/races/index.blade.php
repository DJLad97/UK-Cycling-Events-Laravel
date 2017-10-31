@extends('layouts.app');

@section('content')
    @foreach($races as $race)
<<<<<<< HEAD
        <li><a href="races/show/{{$race->raceID}}">{{ $race->raceName }}</a></li>
=======
<<<<<<< HEAD
        <li><a href="races/show/{{$race->raceID}}">{{ $race->raceName }}</a>test</li>
=======
        <li><a href="races/show/{{$race->raceID}}">{{ $race->raceName }}</a></li>
>>>>>>> 68c347ba95df864ddef7bd927883b9d1c818c801
>>>>>>> b7e0537190866a3b18cf0b9f1abdeb556f2afda2
    @endforeach
@endsection