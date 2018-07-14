@extends('layouts.app')

@section('content')
    <h5>Sory By</h5>
    <form action="/sortRaces" method="get">
        <select name="sortBy" class="form-control" id="sort">
            <option value="mtb">MTB Race</option>
            <option value="road">Road Races</option>
            <option value="startDate">Start Date</option>
            <option value="closingEntryDate">Closing Entry Date</option>
        </select>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
    <input type="text" class="text-box" id="searchTerm" name="searchTerm" autocomplete="off" placeholder="Race Name/Type">
    <ul id="content"></ul>
    <div id="initial-results">
        @foreach($races as $race)
            <li><a href="/races/{{$race->id}}">{{ $race->raceName }}</a></li>
        @endforeach
        {{ $races->render() }}
    </div>
@endsection