import Index from "./Index";

require('./bootstrap');

import router from "./routes";
import VueRouter from 'vue-router';
import moment from "moment";
import StarRating from "./shared/components/StarRating";

window.Vue = require('vue');

Vue.use(VueRouter);

Vue.filter("fromNow", value => moment(value).fromNow());

Vue.component("starRating", StarRating);

const app = new Vue({
    el: '#app',
    router,
    components: {
        "Index": Index
    },
});
