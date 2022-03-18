<template>
    <div>
        <router-link :to="{name: 'carrello', params: {title: 'carrello'}} "><i class="fa-solid fa-cart-shopping"></i></router-link>
    </div>
</template>

<script>
export default {
    name: 'CartIcon',
}
</script>

<style scoped lang="scss">
@import "../../../../sass/_variables.scss";
a{
    text-decoration: none;
    color: black;
    i{
        padding: 17px;
        font-size: 20px;
        background-color: white;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        border-radius: 50%;
        margin-right: 20px;
        transition: 0.3s all;
    }
    i:hover{
        color: $mainColor;
    }
}
</style>