@extends('layouts.app')

@section('content')
    <li>{{ $race->raceName }}</li>
    <li>{{ $race->raceDate }}</li>
    <li>{{ $race->raceAddress }}</li>
    <li>{{ $race->raceType }}</li>
    @if ($race->isFree === 1)
        <li>FREE!</li>
    @else
        <li>{{ $race->entryPrice }}</li>
    @endif
    
    <div id="comments"></div>
@endsection