import ExampleComponent from "./components/ExampleComponent";
import VueRouter from 'vue-router';

const routes = [
    {
        path: "/",
        component: ExampleComponent,
        name: "home",
    }
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

export default router;
