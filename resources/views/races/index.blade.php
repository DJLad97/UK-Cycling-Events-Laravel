@extends('layouts.app');

@section('content')
    @foreach($races as $race)
<<<<<<< HEAD
        <li><a href="races/show/{{$race->raceID}}">{{ $race->raceName }}</a>test</li>
=======
        <li><a href="races/show/{{$race->raceID}}">{{ $race->raceName }}</a></li>
>>>>>>> 68c347ba95df864ddef7bd927883b9d1c818c801
    @endforeach
@endsection