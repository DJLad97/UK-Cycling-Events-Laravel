<template>
    <div :id="mapName" class="map"></div>
</template>

<script>
import $Scriptjs from 'scriptjs';

export default {
    props: ['name', 'data'],
    data(){
        return {
            mapName: this.name,
        }
    },

    mounted () {
        $Scriptjs('https://maps.googleapis.com/maps/api/js?key=AIzaSyDhL0vam5RYKqOF7L_stkM6OJbQ7vSqRP0', () => {
            this.initMap()
        });
    },

    methods: {
        initMap(){
            var data = this.data;
            var coords;
            var infoWindow = new google.maps.InfoWindow();
            var center = {lat: 53.270722, lng: -1.820286};
            this.map = new google.maps.Map(document.getElementById(this.mapName),{
                zoom: 6,
                center: center,
                styles:
                [{"featureType":"landscape","stylers":[{"hue":"#FFA800"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#53FF00"},{"saturation":-73},{"lightness":40},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FBFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#00FFFD"},{"saturation":0},{"lightness":30},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00BFFF"},{"saturation":6},{"lightness":8},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#679714"},{"saturation":33.4},{"lightness":-25.4},{"gamma":1}]}]
            });
    
            for(var i = 0; i < data.length; i++){
                coords = this.ConvertToLatLng(data[i].coordinates);
                var marker = new google.maps.Marker({
                    position: coords,
                    map: this.map,
                    title: data[i].title
                });
                var content = '<a href="races/' + data[i].id + '">More Information</a>';
                google.maps.event.addListener(marker, 'click', 
                    function(marker, content, infoWindow){
                        return function(){
                            infoWindow.setContent(content);
                            infoWindow.open(this.map, marker);
                        }
                    }(marker, content, infoWindow));
            }
        },

        ConvertToLatLng(coords) {
            var latLng = coords.split(/, ?/);
            return new google.maps.LatLng(parseFloat(latLng[0]), parseFloat(latLng[1]));
        }
     }
}
</script>

<style scoped>
 .map {
    padding: 20px 20px 20px 0;
    width: 400px;
    height: 400px;
    border-radius: 100%;
    margin-top: 90px;
    z-index: 0;
    position: relative;
    overflow: hidden;
}
</style>

