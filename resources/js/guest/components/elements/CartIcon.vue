<template>
    <div>
        <div @click="cartPopup()" class="container-cartIcon">
            <i class="fa-solid fa-cart-shopping" ></i>
            <div class="container-popup" :class="cartActive ? 'active' : ''">
                <router-link class="goCart-btn" :to="{name: 'carrello', params: {title: 'carrello'}} ">
                    <div>Vai al carrello</div>
                    
                </router-link>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: 'CartIcon',
    data() {
        return {
            cartActive: false
        }
    },
    methods: {
        cartPopup: function () {
            this.cartActive ? this.cartActive = false : this.cartActive = true;  
        }
    }
}
</script>

<style scoped lang="scss">
@import "../../../../sass/_variables.scss";
    .container-cartIcon{
        position: relative;
    .container-popup{
        background: white;
        position: absolute;
        width: 300px;
        height: 300px;
        z-index: 99;
        top: 110%;
        right: 0;
        display: none;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        border-radius: 15px;
        &.active {
            display: block;
        }
        a.goCart-btn{
            text-decoration: none;
            color: black;
            >div {
                display: inline-block;
                background: $mainColor;
                border: none;
                border-radius: 30px;
                padding: 10px;
                font-size: 16px;
                font-weight: 600;
                
            }
        }
    }
    i{
        display: block;
        
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