<template>
    <div class="row">
        <!-- <div v-for="(races, i) in mapData" :key="i">
            <div v-for="race in races" :key="race.id">
                <div class="col-md-6">
                    <google-map :data="race" name="mtb-map"></google-map>
                </div>
            </div>
        </div> -->
        <!-- <div v-for="(races, i) in mapData" :key="i"> -->
            <!-- <p> {{races}} </p> -->
            <!-- <google-map :data="race[i]" :name="race.type + '-map'"></google-map> -->
            <!-- <div v-for="(race, j) in races" :key="j">
                <p>{{race.title}}</p>
            </div> -->
        <!-- </div> -->
        <div class="col-md-6">
            <google-map :raceData="this.$store.getters.mapData[1]" name="mtb-map"></google-map>
        </div>
         <div class="col-md-6">
            <google-map :raceData="this.$store.getters.mapData[2]" name="road-map"></google-map>
        </div>

        <!-- <div class="col-md-6">
        </div> -->
    </div>
</template>

<script>
    import GoogleMap from './GoogleMap.vue';
    export default {
        data(){
            return {
                mtbRaces: {},
                roadRaces: {},
                mapData: {}
            }
        },
        mounted(){
            // this.getMtbRaces();
            // this.getRoadRaces();
        //   alert(this.$store.getters.mapData[1])
            // this.$store.commit('setMapData');#

        },
        // async created(){
        //     // await this.getMapData();
        //     await axios.get('/api/races/mtb')
        //         .then((response) => {
        //             this.$store.commit('setMapData', response.data);
        //             // this.mtbRaces = response.data;
        //         });
        //     await axios.get('/api/races/road')
        //         .then((response) => {
        //             this.$store.commit('setMapData', response.data);
        //             // this.roadRaces = response.data;
        //         });
        // },
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
            }
            // getMtbRaces() {
            //     axios.get('/api/races/mtb')
            //         .then((response) => {
            //             this.$store.commit('setMapData', response.data);
            //             // this.mtbRaces = response.data;
            //         });
            // },
            // getRoadRaces() {
            //     axios.get('/api/races/road')
            //         .then((response) => {
            //             this.$store.commit('setMapData', response.data);
            //             // this.roadRaces = response.data;
            //         });
            // }
        },
        components: {
            'google-map': GoogleMap
        }
    }
</script>
