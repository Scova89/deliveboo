<template>
    <div class="cart-container">
        <div class="box left col-12 col-lg-4">
            <ul>
                <li v-for="(product, index) in dataShared.cart" :key="index">
                    <div class="name col-7">
                        {{product.name}}
                    </div>
                    <div class="keys col-3">
                        <i class="fas fa-plus" @click="addCart(product)"></i>
                        <span class="quantity">x{{product.quantity}}</span>
                        <i class="fas fa-minus" @click="removeCart(product)"></i>
                    </div>
                    <div class="price col-2">
                        {{price(product)}} €
                    </div>
                </li>
            </ul>
            <div class="total">
                <div>Totale:</div>
                <div>{{total()}} €</div>
                
            </div>

        </div>
        <div class="box right col-12 col-lg-7">

        </div>
    </div>
</template>

<script>
import dataShared from '../dataShared.js';

export default {
    name: 'Carrello',
    data() {
        return {
            dataShared,
        }
    },
    methods: {
        price: function(product) {
            return product.price * product.quantity;
        },
        total: function() {
            let total = 0;
            dataShared.cart.forEach(element => {
                total += element.price * element.quantity;
            });
            return total;
        },
        addCart: function(product) {
            let array = {quantity: 1, id: product.id, name: product.name, price: product.price};
            let index = 0;
            
            if(dataShared.cart[0] != null) {
                console.log(dataShared.cart);
                dataShared.cart.forEach(element => {
                    if(element.id == array.id){
                        element.quantity++;
                        index = element.id;
                        localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                    }
                });
                if(index != array.id){
                    dataShared.cart.push(array);
                    localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                }
            } else {
                dataShared.cart[0] = array;
                console.log(dataShared.cart);
                localStorage.setItem('cart', JSON.stringify(dataShared.cart));
            }
        },

        removeCart: function(product) {
            let array = {quantity: 1, id: product.id, name: product.name, price: product.price};

            dataShared.cart.forEach((element, index) => {
                console.log(element);
                if(element.id == array.id && element.quantity == 1){
                    dataShared.cart.splice(index, 1);
                    console.log('2');
                    localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                } else if(element.id == array.id && element.quantity > 1)
                {
                    element.quantity--;
                    localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                    console.log('3');
                }
            });
        },
    },
    created() {
        dataShared.checkout = true;
    },
}
</script>

<style scoped lang="scss">
@import '../../../sass/_variables.scss';
.cart-container{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    row-gap: 50px;
    .box{
        background-color: white;
        border-radius: 15px;
        min-height: 600px;
        padding: 30px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
    }
    .left{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-right: 20px;
        ul{
            width: 100%;
            padding: 0;
            li{
                display: flex;
                margin: 5px 0px;
                >div{
                    padding: 0;
                }
                .name{
                    overflow: hidden;
                    height: 20px;
                }
                .price{
                    text-align: right;
                }
                .keys{
                    display: flex;
                    justify-content: flex-end;
                    .quantity{
                        padding: 0px 5px;
                        font-weight: 600;
                    }
                    i{
                        padding: 5px;
                        cursor: pointer;
                        border-radius: 20px;
                        color: white;
                        background-color: $mainColor;
                        box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
                    }
                }
            }
        }
        .total{
            height: 40px;
            font-size: 20px;
            display: flex;
            justify-content: space-between;
        }
    }
}
</style>