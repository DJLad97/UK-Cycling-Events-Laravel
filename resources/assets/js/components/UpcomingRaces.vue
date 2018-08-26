<template>
    <!-- <div>
        <h1 id="upcoming-races-header">UPCOMING RACES</h1>
        <div id="upcoming-races-list">
            <div></div>
            <div id="mtb-races">
                <h1>MTB RACES</h1>
                <div v-for="race in upcomingMtbRaces" :key="race.id" class="event-box">
                    <span class="race-date">
                        <strong>15</strong>
                        <em>Oct</em>
                    </span>
                    <div class="race-info">
                        <router-link :to="'/race/' + race.id" class="non-nav">
                            <h3 class="race-name">
                                <strong>{{race.title}}</strong>
                            </h3>
                        </router-link>
                        <span class="close-date">Entries Close: {{race.closing_entry_date}}</span>
                    </div>
                </div>
            </div>
            <div id="road-races">
                <h1>ROAD RACES</h1>
                <div v-for="race in upcomingRoadRaces" :key="race.id" class="event-box">
                    <span class="race-date">
                        <strong>15</strong>
                        <em>Oct</em>
                    </span>
                    <div class="race-info">
                        <router-link :to="'/race/' + race.id" class="non-nav">
                            <h3 class="race-name">
                                <strong>{{race.title}}</strong>
                            </h3>
                        </router-link>
                        <span class="close-date">Entries Close: {{race.closing_entry_date}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container">
        <h1 id="upcoming-races-header">UPCOMING RACES</h1>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5" id="mtb-races">
                <h1>MTB RACES</h1>
                <div v-for="race in upcomingMtbRaces" :key="race.id" class="event-box">
                    <span class="race-date">
                        <strong>{{race.start_date_day}}</strong>
                        <em>{{race.start_date_month}}</em>
                    </span>
                    <div class="race-info">
                        <router-link :to="'/race/' + race.id" class="non-nav">
                            <h3 class="race-name">
                                <strong>{{race.title}}</strong>
                            </h3>
                        </router-link>
                        <span class="close-date">Entries Close: {{race.close_date_day}} {{race.close_date_month}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="road-races">
                <h1>ROAD RACES</h1>
                <div v-for="race in upcomingRoadRaces" :key="race.id" class="event-box">
                    <span class="race-date">
                        <strong>{{race.start_date_day}}</strong>
                        <em>{{race.start_date_month}}</em>
                    </span>
                    <div class="race-info">
                        <router-link :to="'/race/' + race.id" class="non-nav">
                            <h3 class="race-name">
                                <strong>{{race.title}}</strong>
                            </h3>
                        </router-link>
                        <span class="close-date">Entries Close: {{race.close_date_day}} {{race.close_date_month}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        data() {
            return {
                upcomingMtbRaces: {},
                upcomingRoadRaces: {},
            }
        },

        mounted() {
            this.getUpcomingMtbRaces();
            this.getUpcomingRoadRaces();
        },

        computed: {
            startDateDay(){
                // for(var race in this.upcomingMtbRaces){
                //     race['startDateDay'] = 1;
                //     console.log(race);
                // }
            }
        },

        methods: {
            getUpcomingMtbRaces() {
                axios.get('/api/upcomingRaces/MTB')
                    .then((response) => {
                        this.upcomingMtbRaces = response.data;
                        // this.upcomingMtbRaces.forEach(element => {
                        //     var momentDate = moment(element.start_date);
                        //     Vue.set(element, 'start_date_day', momentDate.date());                            
                        //     Vue.set(element, 'start_date_month', momentDate.format('MMM'));                            
                        // });
                        this.upcomingMtbRaces = this.getMonthAndDay(this.upcomingMtbRaces);
                    });
                    // console.log(this.upcomingMtbRaces);
            },

            getUpcomingRoadRaces() {
                axios.get('/api/upcomingRaces/Road')
                    .then((response) => {
                        this.upcomingRoadRaces = response.data;
                        this.upcomingRoadRaces = this.getMonthAndDay(this.upcomingRoadRaces);

                    });
            },

            getMonthAndDay(racesArray){
                racesArray.forEach(element => {
                    var momentStartDate = moment(element.start_date);
                    var momentCloseDate = moment(element.closing_entry_date);
                    Vue.set(element, 'start_date_day', momentStartDate.format('DD'));                            
                    Vue.set(element, 'start_date_month', momentStartDate.format('MMM'));    
                    
                    Vue.set(element, 'close_date_day', momentCloseDate.format('DD'));                            
                    Vue.set(element, 'close_date_month', momentCloseDate.format('MMM'));    
                });

                return racesArray;
            }
        },
    }
</script>