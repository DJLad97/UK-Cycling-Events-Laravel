<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-container">
                <div class="modal-header">
                    <h4>SIGN IN</h4>
                    <button type="button" @click="$emit('close')" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <error-message v-if="loginErrors">Your email or password is incorrect</error-message>
                    <div class="form-group">
                        <label for="email" class="control-label">E-Mail Address</label>
                        <input id="email" v-model="email" type="email" class="text-box" name="email" placeholder="Email" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>

                        <input id="password" v-model="password" type="password" class="text-box" name="password" placeholder="Password" required>
                    </div>
                    <p>
                        <a href="sign-up.php">Don't have an account?</a>
                    </p>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input type="submit" @click="login" name="submit" value="Sign In" class="ukce-btn-dark" />
                    </div>
                </div>
            </div>
        </div>
    </transition> 
</template>

<script>
    export default {
        name: 'LoginModal',
        data(){
            return {
                email: '',
                password: '',
                loginErrors: false
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            login(){
                axios.post('/api/login', {
                    email: this.email,
                    password: this.password
                })
                .then((response) => {
                    // location.reload();
                    this.$store.commit('loginUser');
                    localStorage.setItem('token', response.data);
                    // alert(response);
                    // console.log(response);
                    this.$store.commit('toggleModal');
                    this.loginErrors = false;
                })
                .catch((error) => {
                    if(error.response){
                        this.loginErrors = true;
                        console.log(error.response.data);
                    }
                })
            },
            logout(){
                axios.post('/logout',{

                })
                .then(function(response){
                    location.reload();
                })
            }
        }

    }
</script>
