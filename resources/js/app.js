require('./bootstrap');

import Index from "./Index";
import router from "./routes";
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import storeDefinition from './store';
import moment from "moment";
import StarRating from "./shared/components/StarRating";
import FatalError from "./shared/components/FatalError";
import ValidationErrors from "./shared/components/ValidationErrors";
import Success from "./shared/components/Success";

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(Vuex);

Vue.filter("fromNow", value => moment(value).fromNow());
Vue.filter("dateFormatted", value => moment(value).format('LL'));

Vue.component("starRating", StarRating);
Vue.component("fatal-error", FatalError);
Vue.component("success", Success);
Vue.component("validation-errors", ValidationErrors);

const store = new Vuex.Store(storeDefinition);

window.axios.interceptors.response.use(
    response => response,
    error => {
        if(error.response.status === 401) {
            store.dispatch("logOut");
        }
        return Promise.reject(error);
    }
);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        "Index": Index
    },
    async beforeCreate() {
        await this.$store.dispatch("loadStoredState");
        await this.$store.dispatch("loadUser");
    },
});
