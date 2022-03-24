<template>
    <div class="app">
        <Header/>
        <Main v-if="!dataShared.checkout"/>
        <MainCheckout v-else/>
        <Footer/>
    </div>
</template>

<script>
import dataShared from './dataShared.js'
import Header from './components/macro/Header.vue'
import Main from './components/macro/Main.vue'
import MainCheckout from './components/macro/MainCheckout.vue'
import Footer from './components/macro/Footer.vue'

export default {
    name: 'App',
    components: {
        Header,
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
        Popper.Defaults.modifiers.computeStyle.gpuAcceleration = false

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