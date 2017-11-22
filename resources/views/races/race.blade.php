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
    <p>Please 
    <a class="race-links a-pointer" onclick="document.getElementById('login-modal').style.display='block'; document.getElementById('signup-modal').style.display='none'">
        log in
    </a> or 
    <a class="race-links a-pointer" onclick="document.getElementById('register-modal').style.display='block'; document.getElementById('login-modal').style.display='none';">
        create an account
    </a> to sign up</p>
    @else
        @if(!$race->hasUserSignUp($race->id))
            <form action="/raceSignUps" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="race_id" value="{{$race->id}}">
                <div class="form-group">
                    {{--  <select class="form-control" name="gender" required>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>  --}}
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" checked="checked" value="M" required>
                        Male
                    </input>
                    <input type="radio" name="gender" value="F" required>
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
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" class="text-box" value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Sign Up">
                </div>
            </form>
        @else
            <h2>YOU'VE ALREADY SIGNED UP</h2>
        @endif
    @endguest
@endsection