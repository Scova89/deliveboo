<template>
    <div class="father">
        <div class="container-fluid">
            <router-view :key="$route.path"></router-view>
        </div>
    </div>
</template>

<script>
import Carrello from "../../pages/Carrello.vue"

export default {
    name: 'MainCheckout',
    component: {
        Carrello,
    }
}
</script>

<style scoped lang="scss">
.father{
    max-width: 1400px;
    margin: auto;
    .container-fluid{
        min-height: 600px;
        position: relative;
        top: -100px; 
        margin: 0px 20px;
        width: calc(100% - 40px);
    }
}
</style>