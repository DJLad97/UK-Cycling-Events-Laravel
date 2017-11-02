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

    @guest
    <p>Please <a href="{{route('login')}}">log in</a> or <a href="{{route('register')}}">create an account</a> to sign up</p>
    @else
        <form action="/raceSignUps" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="raceID" value="{{$race->raceID}}">
            <div class="form-group">
                {{--  <select class="form-control" name="gender" required>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>  --}}
                <label for="gender">Gender</label>
                <input type="radio" name="gender" checked="checked" value="M" required>
                    Male
                </input>
                <input type="radio" name="gender" checked="checked" value="F" required>
                    Female
                </input>
            </div>
            <div class="form-group">
                <select class="form-control" name="ageRange" required>
                    <option value="14-17">14-17</option>
                    <option value="18-39">18-39</option>
                    <option value="40+">40+</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Sign Up">
            </div>
        </form>
    @endguest
@endsection