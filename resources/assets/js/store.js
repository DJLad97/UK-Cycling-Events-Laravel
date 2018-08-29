import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state:{ 
        isLoggedIn: !!localStorage.getItem('token'),
        modalState: false,
        mapData: {},
    },
    getters: {
        isLoggedIn(state){
            return state.isLoggedIn;
        },
        isModalOpen(state){
            return state.modalState;
        },
        mapData(state){
            return state.mapData;
        }
    },
    mutations: {
        loginUser(state){
            state.isLoggedIn = true;
        },
        logoutUser(state){
            state.isLoggedIn = false;
        },
        toggleModal(state){
            state.modalState = !state.modalState;
        },
        closeModal(state){
            state.modalState = false;
        },
        setMapData(state, payload){
            // axios.get('/api/races/mtb')
            //   .then(response => {
            //     state.mapData = response.data;
            // });
            state.mapData[Object.keys(state.mapData).length + 1] = payload;
        }
    },
    actions: {
        fetchMapData (store) {
            return axios.get('/api/races/mtb')
              .then(response => {
                store.commit('setSomething', response.data)
              })
        }
    }

})