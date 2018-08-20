<template>
    <div id="mtbRaces">
        <ul>
            <li v-for="race in races.data" :key="race.id">
                <a :href='"/race/" + race.id'>{{race.title}}</a>
            </li>
        </ul>
        <pagination v-bind:data="races" @pagination-change-page="getRaces"></pagination>
    </div>
</template>

<script>
    import pagination from 'laravel-vue-pagination';
    export default {
        data(){
            return {
                races: {}
            }
        },

        mounted(){
            this.getRaces();
        },
        methods: {
            getRaces(page = 1){
                axios.get('/api/races?page=' + page)
                .then((response) => {
                    this.races = response.data
                })
                .catch(function(error){
                    console.log(error);
                    alert('Something Went Wrong...')
                });
            }
        },
        components:{
            pagination
        }
    }
</script>
