<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-container">
                <div class="modal-header">
                    <h4>SIGN UP</h4>
                    <button type="button" @click="$emit('close')" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="reg-name-input">
                    <div class="form-group">
                        <label for="name">Name</label>*
                        <input id="name" v-model="name" type="text" :class="{'input-error': errors.name, 'text-box': true}" name="name" placeholder="Name" required autofocus>
                        <span v-if="errors.name" class="input-error-message">{{errors.name}}</span>
                    </div>
                    <div class="form-group" id="reg-username-input">
                        <label for="username">Username</label>*
                        <input id="username" v-model="username" type="text" :class="{'input-error': errors.username, 'text-box': true}" name="username" placeholder="Username" required autofocus>
                        <span v-if="errors.username" class="input-error-message">{{errors.username}}</span>
                    </div>
                    <div class="form-group" id="reg-email-input">
                        <label for="email">E-Mail Address</label>*
                        <input id="email" v-model="email" type="email" :class="{'input-error': errors.email, 'text-box': true}" name="email" placeholder="Email" required>
                        <span v-if="errors.email" class="input-error-message">{{errors.email}}</span>
                    </div>
                    <div class="form-group" id="reg-password-input">
                        <label for="password">Password</label>*
                        <input id="password" v-model="password" type="password" :class="{'input-error': errors.password, 'text-box': true}" name="password" placeholder="Password" required>
                        <span v-if="errors.password" class="input-error-message">{{errors.password}}</span>
                    </div>
                    <div class="form-group" id="reg-passwordconf-input">
                        <label for="password-confirm">Confirm Password</label>*
                        <input id="password-confirm" v-model="passwordConfirm" type="password" :class="{'input-error': errors.password, 'text-box': true}" name="password_confirmation" placeholder="Password Confirmation" required>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4">
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input type="submit" @click="register" name="submit" class="ukce-btn-dark" value="Register">
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: 'RegisterModal',
        data() {
            return {
                name: '',
                username: '',
                email: '',
                password: '',
                passwordConfirm: '',
                errors: {},
                errorClass: 'input-error',
                textBoxClass: 'text-box'
            }
        },

        methods: {
            register() {
                axios.post('/api/register', {
                        name: this.name,
                        email: this.email,
                        username: this.username,
                        password: this.password,
                        password_confirmation: this.passwordConfirm
                    })
                    .then(function (response) {
                        location.reload();
                    })
                    .catch((error) => {
                        this.errors = {};
                        var recievedErrors = error.response.data.errors;
                        Object.keys(recievedErrors).forEach(element => {
                            this.errors[element] = recievedErrors[element][0];
                        });

                        console.log(this.errors.username);
                    });
            }
        }
    }
</script>