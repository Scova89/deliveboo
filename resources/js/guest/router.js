import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import PageNotFound from "./pages/PageNotFound.vue";
import Ristoranti from "./components/elements/Ristoranti.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
            meta: { title: 'Home' }
        },
        {
            path: "/ristoranti",
            name: "ristoranti",
            component: Ristoranti,
            meta: { title: 'Ristoranti' }
        },
        {
            path: "*",
            name: "page-404",
            component: PageNotFound,
            meta: { title: 'Error 404' }
        },
    ],
    scrollBehavior() {
        return { x: 0, y: 0 }
    }
});

export default router 