import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state:{ 
        isLoggedIn: !!localStorage.getItem('token'),
        modalState: false
    },
    getters: {
        isLoggedIn(state){
            return state.isLoggedIn;
        },
        isModalOpen(state){
            return state.modalState;
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
        }
    }

})