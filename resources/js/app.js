import Index from "./Index";

require('./bootstrap');

import router from "./routes";
import VueRouter from 'vue-router';

window.Vue = require('vue');

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router,
    components: {
        "Index": Index
    },
});
