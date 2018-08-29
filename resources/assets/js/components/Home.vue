<template>
    <div id="home-page">
        <carousel>
            <div class="carousel-item active">
                <div class="fill mtb-image" alt="Second slide"></div>
                <div class="carousel-caption d-none d-md-block">
                    <div v-if="Object.keys(upcomingMtbRace).length > 0">
                        <h1 class="upcoming-race-text">
                            {{upcomingMtbRace.title}}
                            <br>
                            {{upcomingMtbRace.start_date}}
                        </h1>
                        <p>
                            <router-link class="ukce-btn" :to="'/race/' + upcomingMtbRace.id">REGISTER</router-link>
                        </p>
                    </div>
                    <div v-else>
                        <h1 class="upcoming-race-text">NO UPCOMING RACE</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="fill road-image" alt="Second slide"></div>
                <div class="carousel-caption d-none d-md-block">
                    <div v-if="Object.keys(upcomingRoadRace).length > 0">
                        <h1 class="upcoming-race-text">
                            {{upcomingRoadRace.title}}
                            <br>
                            {{upcomingRoadRace.start_date}}
                        </h1>
                        <p>
                            <a class="ukce-btn" :href="'/race/' + upcomingRoadRace.id">REGISTER</a>
                        </p>
                    </div>
                    <div v-else>
                        <h1 class="upcoming-race-text">NO UPCOMING RACE</h1>
                    </div>
                </div>
            </div>
        </carousel>
        <div class="container well-custom">
            <upcoming-races></upcoming-races>
            <!-- <races-map></races-map> -->
            <div class="row">
                <div class="col-md-6">
                    <google-map :raceData="this.$store.getters.mapData[1]" name="mtb-map"></google-map>
                </div>
                <div class="col-md-6">
                    <google-map :raceData="this.$store.getters.mapData[2]" name="road-map"></google-map>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import store from '../store';
    import carousel from './Carousel.vue';
    import UpcomingRaces from './UpcomingRaces.vue';
    import RacesMap from './RacesMap.vue';
    import GoogleMap from './GoogleMap.vue';

    export default {
        data(){ 
            return {
                upcomingMtbRace: {noRace: false},
                upcomingRoadRace: {noRace: false},
            }
        },
        mounted(){
            this.getUpcomingMtbRace();
            this.getUpcomingRoadRace();
        },

        methods: {
            getMapData(){
                axios.get('/api/races/mtb')
                    .then((response) => {
                        this.$store.commit('setMapData', response.data);
                        // this.mtbRaces = response.data;
                    });
                axios.get('/api/races/road')
                    .then((response) => {
                        this.$store.commit('setMapData', response.data);
                        // this.roadRaces = response.data;
                    });
            },
            getUpcomingMtbRace(){
                axios.get('/api/upcomingRace/mtb')
                    .then((response) => {
                        this.upcomingMtbRace = response.data;
                    });
            },

            getUpcomingRoadRace(){
                axios.get('/api/upcomingRace/road')
                    .then((response) => {
                        this.upcomingRoadRace = response.data;
                    });
            }
        },
        components:{
            carousel,
            'upcoming-races': UpcomingRaces,
            'races-map': RacesMap,
            'google-map': GoogleMap
        }
    }
</script>