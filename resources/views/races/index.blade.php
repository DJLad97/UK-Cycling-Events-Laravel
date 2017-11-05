@extends('layouts.app')

@section('content')
    <div class="cart">
        @foreach($cart as $item)
            <li>
                {{ $item['name'] }}
                {{ $item['price'] }}
                <input type="button" onclick="removeItem()" class="btn btn-danger" name="removeItem" id="removeItem" value="Remove">
            <li>
        @endforeach
    </div>
    {{ var_dump($cart) }}
    {{--  {{ Session::get('cart')->Name}}  --}}
    <input type="text" class="text-box" id="searchTerm" name="searchTerm" autocomplete="off" placeholder="Race Name/Type">
    <ul id="content"></ul>
    <div id="initial-results">
        @foreach($races as $race)
            <li><a href="/races/{{$race->id}}">{{ $race->raceName }}</a></li>
        @endforeach
    </div>
@endsection