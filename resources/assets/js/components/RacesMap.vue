<template>
    <div class="row">
        <div class="col-md-6">
            <google-map :data="mtbRaces" name="mtb-map"></google-map>
        </div>
        <div class="col-md-6">
            <!-- <google-map name="race-map"></google-map> -->
        </div>
    </div>
</template>

<script>
    import GoogleMap from './GoogleMap.vue';
    export default {
        data(){
            return {
                mtbRaces: {},
                roadRaces: {}
            }
        },
        mounted(){
            this.getMtbRaces()
        },
        methods: {
            getMtbRaces() {
                axios.get('/api/races/mtb')
                    .then((response) => {
                        this.mtbRaces = response.data;
                    });
            }
        },
        components: {
            'google-map': GoogleMap
        }
    }
</script>
