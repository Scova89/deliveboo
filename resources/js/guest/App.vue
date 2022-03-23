<template>
    <div class="app">
        <Header/>
        <Jumbotron/>
        <Main v-if="!dataShared.checkout"/>
        <MainCheckout v-else/>
        <Footer/>
    </div>
</template>

<script>
import dataShared from './dataShared.js'
import Header from './components/macro/Header.vue'
import Jumbotron from './components/macro/Jumbotron.vue'
import Main from './components/macro/Main.vue'
import MainCheckout from './components/macro/MainCheckout.vue'
import Footer from './components/macro/Footer.vue'

export default {
    name: 'App',
    components: {
        Header,
        Jumbotron,
        Main,
        Footer,
        MainCheckout,
    },
    data() {
        return {
            dataShared,
        }
    },
    mounted() {
        window.onpopstate = function() {
            dataShared.checkout = false;
        };
    },
    created() {
        dataShared.cart = JSON.parse(localStorage.getItem('cart')) != null ? JSON.parse(localStorage.getItem('cart')) : [];
    },
}
</script>

<style scoped lang="scss">
@import '../../sass/_variables.scss';
    .app{
        background-color: $background;
        min-height: 100vh;
    }
</style>