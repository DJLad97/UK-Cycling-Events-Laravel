<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'UK Cycling Events') }}</title>

    <!-- Styles -->
    {{--  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/meanmenu.min.css') }}" rel="stylesheet"> 
    <link href="{{ mix('css/nav.css') }}" rel="stylesheet">
</head>
<body>
    {{-- @include('layouts.nav')
    @include('layouts.modals') --}}
    {{--  {{var_dump($cart)}}  --}}
        {{-- <p>{{dd(JWTAuth::parseToken()->toUser())}}</p> --}}
    <div id="app" class="well-custom">
        {{-- @yield('content') --}}
        {{-- <router-link to="/">Home</router-link>
        <router-link to="/races">Races</router-link>
        <router-link to="/sign-up">Register</router-link>
        <router-view></router-view> --}}
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    {{-- <script src="{{ mix('js/main.js') }}"></script>
    <script src="{{ mix('js/ajax.js') }}"></script>
    <script src="{{ mix('js/races-map.js') }}"></script> 
    <script src="{{ asset('js/jquery.meanmenu.js') }}"></script> --}}
    {{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  --}}
    <script type="text/javascript">
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        
        // function removeItem(id){
        //     $.ajax({
        //         dataType: 'json',
        //         method: 'POST',
        //         url: '/removeCartItem',
        //         data: {'itemID': id},
        //         success: function(data){
        //             var cart = data;
        //             $('.dropdown-menu').empty();
        //             $.each(data, function(){
        //                 var idKey = Object.keys(this)[0];
        //                 var nameKey = Object.keys(this)[1];
        //                 var id = this[idKey];
        //                 var name = this[nameKey];
        //                 $('.dropdown-menu').append('<li>' + name + '</li><input type="button" onclick="removeItem(' + id + ')" class="btn btn-danger" name="removeItem" id="removeItem" value="Remove">')
        //             });
        //         }
        //     });
        // }
    </script>
    {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhL0vam5RYKqOF7L_stkM6OJbQ7vSqRP0&callback=initMap"></script> --}}
    
</body>
</html>
