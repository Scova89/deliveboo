<template :key="dataShared.key">
    <div class="cart-container">
        <div class="wrapper col-12 col-lg-5">
            <div class="box left">
                <div class="empty" v-if="dataShared.cart.length == 0">Il carrello è vuoto</div>
                <ul>
                    <li v-if="dataShared.cart.length != 0">
                        <div class="head col-7">Prodotto</div>
                        <div class="head col-3">Quantità</div>
                        <div class="head col-2">Totale</div>
                    </li>
                    <li v-for="(product, index) in dataShared.cart" :key="index">
                        <div class="name col-7">
                            {{product.name}}
                        </div>
                        <div class="keys col-3">
                            <div><i class="fas fa-minus" @click="removeCart(product)"></i></div>
                            <span class="quantity">x{{product.quantity}}</span>
                            <div><i class="fas fa-plus" @click="addCart(product)"></i></div>
                        </div>
                        <div class="price col-2">
                            {{price(product).toFixed(2)}} €
                        </div>
                    </li>
                </ul>
                <div class="total">
                    <div>Totale:</div>
                    <div>{{total().toFixed(2)}} €</div>
                    
                </div>

            </div>
        </div>
        <div class="wrapper col-12 col-lg-7">
            <div class="box right">
                
            </div>
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
            product.quantity++;
			localStorage.setItem('cart', JSON.stringify(dataShared.cart));
        },

        removeCart: function(product) {
            let array = {quantity: 1, id: product.id, name: product.name, price: product.price, user_id: product.user_id};
            dataShared.key++;

            dataShared.cart.forEach((element, index) => {
                if(element.id == array.id && element.quantity == 1){
                    dataShared.cart.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                } else if(element.id == array.id && element.quantity > 1)
                {
                    element.quantity--;
                    localStorage.setItem('cart', JSON.stringify(dataShared.cart));
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
    .wrapper{
        .box{
            background-color: white;
            border-radius: 15px;
            min-height: 600px;
            padding: 10px 30px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
        }
        .left{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            .empty{
                text-align: center;
                font-size: 30px;
                font-weight: 500;
                padding: 50px 0px;
            }
            ul{
                width: 100%;
                padding: 0;
                .head{
                    font-weight: 600;
                    font-size: 20px;
                }
                .head:nth-child(1){
                    text-align: start;
                }
                .head:nth-child(2){
                    text-align: center;
                }
                .head:nth-child(3){
                    text-align: end;
                }
                li{
                    display: flex;
                    margin: 15px 0px;
                    >div{
                        padding: 0;
                    }
                    .name{
                        overflow: hidden;
                        height: 30px;
                        white-space: nowrap;
                        overflow: hidden !important;
                        text-overflow: ellipsis;
                    }
                    .price{
                        text-align: right;
                    }
                    .keys{
                        display: flex;
                        justify-content: flex-end;
                        .quantity{
                            padding: 0px 10px;
                            font-size: 20px;
                        }
                        div{
                            height: 100%;
                            i{
                                padding: 7px;
                                cursor: pointer;
                                border-radius: 20px;
                                color: white;
                                background-color: $mainColor;
                                box-shadow: rgba(0, 0, 0, 0.24) 0px 1px 3px;
                            }
                        }
                        
                    }
                }
            }
            .total{
                height: 40px;
                font-size: 20px;
                font-weight: 600;
                display: flex;
                justify-content: space-between;
                border-top: 2px solid black;
                padding-top: 5px;
            }
        }
    }
}
</style>