window.initMap = function(){
    var coords;
    var infoWindow = new google.maps.InfoWindow();
    var center = {lat: 53.270722, lng: -1.820286};
    var map = new google.maps.Map(document.getElementById('mtbMap'),{
        zoom: 6,
        center: center,
        styles:
        [{"featureType":"landscape","stylers":[{"hue":"#FFA800"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#53FF00"},{"saturation":-73},{"lightness":40},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FBFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#00FFFD"},{"saturation":0},{"lightness":30},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00BFFF"},{"saturation":6},{"lightness":8},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#679714"},{"saturation":33.4},{"lightness":-25.4},{"gamma":1}]}]
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        dataType: 'json',
        method: 'GET',
        url: '/mtbRaces', 
        success: function(data){
            for(var i = 0; i < data.length; i++){
                coords = ConvertToLatLng(data[i].raceCoordinates);

                var marker = new google.maps.Marker({
                    position: coords,
                    map: map,
                    title: data[i].raceName
                });
                var content = '<a href="races/' + data[i].id + '">More Information</a>';
            
                google.maps.event.addListener(marker, 'click',
                    function(marker, content, infoWindow){
                        return function() {
                            infoWindow.setContent(content);
                            infoWindow.open(map,marker);
                        }
                    }(marker, content, infoWindow));
            }
            // console.log(data);
        }
    });

}

function ConvertToLatLng(coords) {
    var latLng = coords.split(/, ?/);
    return new google.maps.LatLng(parseFloat(latLng[0]), parseFloat(latLng[1]));
}