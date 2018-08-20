<template>
    <div id="app">
        <Nav></Nav>
        <router-view></router-view>
        <!-- <LoginModal v-if="modalState" @close="toggleModal"></LoginModal> -->
        <!-- <button id="show-modal" @click="toggleModal">Show Modal</button> -->
        
        <!-- <LoginModal></LoginModal> -->
        <!-- <RegisterModal></RegisterModal> -->
    </div>
</template>

<script>
    import Nav from './components/Nav.vue';
    import LoginModal from './components/Login.vue';
    import RegisterModal from './components/Register.vue';

    export default {
        name: 'App',
        data() {
            return {
                modalState: this.$store.state.modalState
            }
        },
        computed:{
            isModelOpen(){
                return this.$store.state.modalState;
            }
        },
        components: {
            Nav,
            LoginModal,
            RegisterModal
        }
    }
</script>