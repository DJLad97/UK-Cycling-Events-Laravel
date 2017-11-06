@extends('layouts.app')

@section('content')
    <div class="cart">
        @foreach($cart as $item)
            <li>
                {{ $item['name'] }}
                {{ $item['price'] }}
                <input type="button" onclick="removeItem({{$item['id']}})" class="btn btn-danger" name="removeItem" id="removeItem" value="Remove">
            <li>
        @endforeach
    </div>
    {{ var_dump($cart) }}
    {{--  {{ Session::get('cart')->Name}}  --}}
    <input type="text" class="text-box" id="searchTerm" name="searchTerm" autocomplete="off" placeholder="Race Name/Type">
    <ul id="content"></ul>
    <div id="initial-results">
        @foreach($races as $race)
        <form action="/raceSignUps" method="post">
                {{ csrf_field() }}
            <input type="hidden" name="race_id" value="{{$race->id}}">
            <input type="hidden" name="gender" value="M">
            <input type="hidden" name="ageRange" value="18-39">
            <input type="hidden" name="name" value="Dan Scott">
            <li><a href="/races/{{$race->id}}">{{ $race->raceName }}</a></li>
        <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Sign Up">
            </div>
        </form>
        @endforeach
    </div>
@endsection