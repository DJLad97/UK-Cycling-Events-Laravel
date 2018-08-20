<template>
    <div>
        <header class="inline-header">
            <nav class="navbar navbar-inverse navbar-fixed-top" style="display: block;">
                <ul>
                    <li class="nav-item"><router-link to="/">UK CYLCING EVENTS</router-link></li>
                    <li class="nav-item"><router-link to="/races">RACES</router-link></li>
                    <li v-if="loggedIn" class="nav-item"><router-link to="/profile">PROFILE</router-link></li>
                    <li v-if="!loggedIn" class="nav-item"><a @click="toggleModal('LoginModal')" id="show-modal">SIGN IN</a></li>
                    <li v-if="!loggedIn" class="nav-item"><a @click="toggleModal('RegisterModal')">SIGN UP</a></li>
                    <li v-if="loggedIn" class="nav-item"><a @click="logout">LOG OUT</a></li>
                </ul>
            </nav>
        </header>
        <component :is="currentModalComponent" v-if="isModelOpen" @close="toggleModal" class="model-open"></component>
    </div>
</template>

<script>
    import LoginModal from '../components/Login.vue';
    import RegisterModal from '../components/Register.vue';

    export default {
        name: 'Nav',
        data(){
            return {
                currentModal: ''
            }
        },
        computed:{
            isModelOpen(){
                return this.$store.state.modalState;
            },
            loggedIn(){
                return this.$store.state.isLoggedIn;
            },
            currentModalComponent(){
                return this.currentModal;
            }
        },
        methods:{
            logout(){
                localStorage.removeItem('token');
                this.$storecommit('logout');
            },
            openModal(){
                this.$store.commit('openModal');
            },
            toggleModal(val){
                this.currentModal = val;
                this.$store.commit('toggleModal');
            },
            logout(){
                localStorage.removeItem('token');
                this.$store.commit('logoutUser');
            }
        },
        components: {
            LoginModal,
            RegisterModal
        }
    };
</script>