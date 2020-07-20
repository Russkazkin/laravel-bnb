import Index from "./Index";

require('./bootstrap');

import router from "./routes";
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import moment from "moment";
import StarRating from "./shared/components/StarRating";
import FatalError from "./shared/components/FatalError";
import ValidationErrors from "./shared/components/ValidationErrors";
import Success from "./shared/components/Success";

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(Vuex);

Vue.filter("fromNow", value => moment(value).fromNow());

Vue.component("starRating", StarRating);
Vue.component("fatal-error", FatalError);
Vue.component("success", Success);
Vue.component("validation-errors", ValidationErrors);

const app = new Vue({
    el: '#app',
    router,
    components: {
        "Index": Index
    },
});
