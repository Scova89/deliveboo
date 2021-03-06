import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import PageNotFound from "./pages/PageNotFound.vue";
import Ristoranti from "./components/elements/Ristoranti.vue";
import RistoranteSinglePage from "./pages/RistoranteSinglePage.vue";
import Prodotto from "./pages/Prodotto.vue";
import Carrello from "./pages/Carrello.vue";
import Checkout from "./pages/Checkout.vue";

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
            path: "/ristoranti/:slug",
            name: "ristorante",
            component: RistoranteSinglePage,
        },
        {
            path: "/prodotto/:slug",
            name: "prodotto",
            component: Prodotto,
        }, 
        {
            path: "/carrello",
            name: "carrello",
            component: Carrello,
        },
        {
            path: "/checkout",
            name: "checkout",
            component: Checkout,
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