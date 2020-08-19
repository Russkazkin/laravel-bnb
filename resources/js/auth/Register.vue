<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-body">
                    <form @submit.prevent="login">
                        <div class="form-group">
                            <label for="name">
                                Name
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   placeholder="Enter your name"
                                   v-model="name"
                                   :class="[{'is-invalid' : errorsFor('name')}]">
                            <validation-errors :errors="errorsFor('name')"></validation-errors>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                E-mail
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   placeholder="Enter your email"
                                   v-model="email"
                                   :class="[{'is-invalid' : errorsFor('email')}]">
                            <validation-errors :errors="errorsFor('email')"></validation-errors>
                        </div>
                        <div class="form-group">
                            <label for="password">
                                Password
                            </label>
                            <input type="password"
                                   class="form-control"
                                   id="password"
                                   name="password"
                                   placeholder="Enter your password"
                                   v-model="password"
                                   :class="[{'is-invalid' : errorsFor('password')}]">
                            <validation-errors :errors="errorsFor('password')"></validation-errors>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">
                                Retype password
                            </label>
                            <input type="password"
                                   class="form-control"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   placeholder="Confirm your password"
                                   v-model="password_confirmation"
                                   :class="[{'is-invalid' : errorsFor('password_confirmation')}]">
                            <validation-errors :errors="errorsFor('password_confirmation')"></validation-errors>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-4" :disabled="loading">Login</button>

                        <hr>

                        <div>
                            No account yet?
                            <router-link :to="{name: 'home'}" class="font-weight-bold">Register</router-link>
                        </div>
                        <div>
                            Forgotten password?
                            <router-link :to="{name: 'home'}" class="font-weight-bold">Reset password</router-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import validationErrors from "../shared/mixins/validationErrors";
import {is422} from "../shared/utils/responce";
import {logIn} from "../shared/utils/auth";

export default {
    name: "Login",
    mixins: [validationErrors],
    data() {
        return {
            email: null,
            password: null,
            loading: false,
            error: false,
        }
    },
    methods: {
        async login() {
            this.loading = true;
            this.errors = null;
            try {
                await axios.get('/sanctum/csrf-cookie');
                await axios.post('/login', {
                    email: this.email,
                    password: this.password,
                });
                logIn();
                await this.$store.dispatch("loadUser");
                await this.$router.push({name: "home"});
            } catch (error) {
                if(is422(error)) {
                    this.errors = error.response.data.errors;
                } else {
                    this.error = true;
                }
            } finally {
                this.loading = false;
            }
        }
    },
}
</script>

<style scoped>

</style>

