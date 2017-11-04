@extends('layouts.app')

@section('content')
    <input type="text" class="text-box" id="searchTerm" name="searchTerm" autocomplete="off" placeholder="Race Name/Type">
    <ul id="content"></ul>
    <div id="initial-results">
        @foreach($races as $race)
            <li><a href="/races/{{$race->id}}">{{ $race->raceName }}</a></li>
        @endforeach
    </div>
@endsection