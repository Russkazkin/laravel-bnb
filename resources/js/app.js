import Index from "./Index";

require('./bootstrap');

import router from "./routes";
import VueRouter from 'vue-router';
import moment from "moment";

window.Vue = require('vue');

Vue.use(VueRouter);

Vue.filter("fromNow", value => moment(value).fromNow());

const app = new Vue({
    el: '#app',
    router,
    components: {
        "Index": Index
    },
});
