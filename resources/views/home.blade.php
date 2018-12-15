@extends('layouts.app')

@section('content')

{{-- <div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="fill mtb-image" alt="First slide"></div>
            <div class="carousel-caption d-none d-md-block">
                <h1 class="upcoming-race-text">
                    parkwood loop
                    <br>
                    21st January
                </h1>
                <p>
                    <button class="ukce-btn">REGISTER</button>
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="fill road-image"  alt="Second slide"></div>
            <div class="carousel-caption d-none d-md-block">
                <h1 class="upcoming-race-text">
                    parkwood loop
                    <br>
                    21st January
                </h1>
                <p>
                    <button class="ukce-btn">REGISTER</button>
                </p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev center-carousel-btns" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next center-carousel-btns" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div> --}}

<div id="home-page">
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                {{-- <img class="d-block w-100" src="{{asset('/images/mtb.jpg')}}" alt="First slide"> --}}
                <div class="fill mtb-image" alt="First slide"></div>
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="upcoming-race-text">
                        {{$raceData['upcomingMtbRace']->title}}
                        <br>
                        {{$raceData['upcomingMtbRace']->start_date}}
                    </h1>
                    <p>
                        <a class="ukce-btn" href="/race/{{$raceData['upcomingMtbRace']->id}}">REGISTER</a>
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                {{-- <img class="d-block w-100" src="{{asset('/images/road.jpg')}}" alt="Second slide"> --}}
                <div class="fill road-image" alt="Second slide"></div>
                <div class="carousel-caption d-none d-md-block">
                        <h1 class="upcoming-race-text">
                            {{$raceData['upcomingRoadRace']->title}}
                            <br>
                            {{$raceData['upcomingRoadRace']->start_date}}
                        </h1>
                    <p>
                        <a class="ukce-btn" href="/race/{{$raceData['upcomingRoadRace']->id}}">REGISTER</a>
                    </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev center-carousel-btns" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next center-carousel-btns" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    
    <div class="container well-custom">
        <h1 id="upcoming-races-header">UPCOMING RACES</h1>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5" id="mtb-races">
                <h1>MTB RACES</h1>
                @foreach ($raceData['upcomingMtbRaces'] as $race)
                    <div class="event-box">
                        <span class="race-date">
                            <strong>{{$race->seperatedStartDate['day']}}</strong>
                            <em>{{$race->seperatedStartDate['month']}}</em>
                        </span>
                        <div class="race-info">
                            <a href="/race/{{$race->id}}" class="non-nav">
                                <h3 class="race-name">
                                    <strong>{{$race->title}}</strong>
                                </h3>
                            </a>
                            <span class="close-date">Entries Close: {{$race->seperatedClosingDate['month']}} {{$race->seperatedClosingDate['day']}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-5" id="road-races">
                <h1>ROAD RACES</h1>
                @foreach ($raceData['upcomingRoadRaces'] as $race)
                    <div class="event-box">
                        <span class="race-date">
                            <strong>{{$race->seperatedStartDate['day']}}</strong>
                            <em>{{$race->seperatedStartDate['month']}}</em>
                        </span>
                        <div class="race-info">
                            <a href="/race/{{$race->id}}" class="non-nav">
                                <h3 class="race-name">
                                    <strong>{{$race->title}}</strong>
                                </h3>
                            </a>
                            <span class="close-date">Entries Close: {{$race->seperatedClosingDate['month']}} {{$race->seperatedClosingDate['day']}}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-2"></div>
        </div>
        <h2>UPCOMING RACE LIST</h2>
        <h3>MTB RACES | ROAD RACES</h3>
        <h3>MTB RACE MAP | ROAD RACE MAP</h3>
        
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div id="mtbMap" class="circle-map"></div>
            </div>
        
            <div class="col-md-6 col-lg-6">
                <div id="roadMap" class="circle-map"></div>
            </div>
        </div>
    </div>
</div>
@endsection
