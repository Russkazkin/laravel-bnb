<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-body">
                <form>
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
                    <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

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

export default {
    name: "Login",
    mixins: [validationErrors],
    data() {
        return {
            email: null,
            password: null,
        }
    }
}
</script>

<style scoped>

</style>
