<template>
	<div>
		<div  class="container-cartIcon">
			
            <div v-click-outside="disablePopup">
                <i @click="cartPopup" class="fa-solid fa-cart-shopping cart">
                    <div class="number-element" v-if="dataShared.cart.length != 0">
                        {{dataShared.cart.length}}
                    </div>
                </i>
                <div :class="cartActive ? 'active' : ''" class="cart-container">
                    <div class="container-popup">
                        <div class="list-product">
                            <ul v-if="dataShared.cart[0] != null">
                                <li v-for="(element, index) in dataShared.cart" :key="index" >
                                    <div class="col-5">{{ element.name }}</div>
                                    <div class="col-4">
                                        <i class="fas fa-plus" @click="addCart(element)"></i>
                                        <span class="quantity">x{{element.quantity}}</span>
                                        <i class="fas fa-minus" @click="removeCart(element)"></i>
                                    </div>
                                    <div class="col-3">€ {{element.price * element.quantity}}</div>
                                </li>
                            </ul>
                            <h2 v-else>Il carrello è vuoto</h2>
                        </div>
                        <div class="cart-btn">
                            <div class="tot">
                                <div>Totale:</div>
                                <div>{{total()}}</div>
                            </div>
                            <div class="buttons">
                                <router-link :to="{ name: 'carrello', params: { title: 'carrello' } }">
                                    <div @click="disablePopup()">
                                        Vai al carrello
                                    </div>
                                </router-link>
                                <div>
                                    <div class="clear-cart" @click="clearConfirm()">Svuota carrello</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
		</div>


        <div class="modal fade" id="confirmClear" tabindex="-1" role="dialog" aria-labelledby="deleteBoxLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Svuota carrello</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler svuotare il carrello? Tutti gli elementi salvati andranno persi.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" @click="clearCart()">Svuota carrello</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>
import dataShared from "../../dataShared";
import vClickOutside from 'v-click-outside';

export default {
	name: "CartIcon",
	data() {
		return {
			cartActive: false,
			dataShared,
		};
	},
    directives: {
        clickOutside: vClickOutside.directive
    },
	methods: {
        total: function() {
            let total = 0;
            dataShared.cart.forEach(element => {
                total += element.price * element.quantity;
            });
            return total;
        },
		cartPopup() {
			this.cartActive  ? (this.cartActive = false) : (this.cartActive = true);
		},
        disablePopup () {
            this.cartActive = false;
        },
		addCart: function(product) {
            product.quantity++;
			localStorage.setItem('cart', JSON.stringify(dataShared.cart));
        },

        removeCart: function(product) {
            let array = {quantity: 1, id: product.id, name: product.name, price: product.price, user_id: product.user_id};
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
        clearCart() {
            dataShared.cart = [];
            localStorage.clear('cart');
        },
        clearConfirm () {
            if( localStorage.getItem('cart') != null){
                $('#confirmClear').modal('show');
            }
        }
	},
};
</script>

<style scoped lang="scss">
@import "../../../../sass/_variables.scss";

div{
    .container-cartIcon{
        div{
            position: relative;
            >i{
                position: relative;
                display: block;
                padding: 17px;
                font-size: 20px;
                background-color: white;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
                border-radius: 50%;
                margin-right: 20px;
                transition: 0.3s all;
                &:hover{
                    color: $mainColor;
                }
                .number-element {
                    position: absolute;
                    top: -5px;
                    right: -5px;
                    border-radius: 50%;
                    background: tomato;
                    font-weight: 600;
                    width: 25px;
                    height: 25px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 15px;
                    color: black;
                }
            }
            .cart-container{
                transition: 0.5s all;
                padding: 20px 15px;
                background: white;
                position: absolute;
                width: 400px;
                height: 500px;
                z-index: -10;
                top: 70px;
                right: 15px;
                opacity: 0;
                -webkit-box-shadow:  0px 0px 0px 9999px rgba(0, 0, 0, 0.3);
                box-shadow:  0px 0px 0px 9999px rgba(0, 0, 0, 0.3);
                border-radius: 15px;
                .container-popup {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    height: 100%;
                    .list-product {
                        ul {
                            list-style: none;
                            margin: 0;
                            padding: 0;
                            font-weight: 600;
                            li {
                                display: flex;
                                margin-bottom: 15px;
                                div:first-of-type{
                                    display: inline-block;
                                    white-space: nowrap;
                                    overflow: hidden !important;
                                    text-overflow: ellipsis;
                                }
                                div{
                                    display: flex;
                                    
                                    .quantity{
                                        padding: 0px 10px;
                                        font-size: 20px;
                                    }
                                    i {
                                        padding: 5px;
                                        cursor: pointer;
                                        border-radius: 20px;
                                        color: white;
                                        background-color: $mainColor;
                                        box-shadow: rgba(0, 0, 0, 0.24) 0px 1px 3px;
                                        margin: 0;
                                    }
                                }
                                div:last-of-type{
                                    text-align: right;
                                    display: block;
                                }
                            }
                        }
                        h2 {
                            text-align: center;
                        }
                    }
                    .cart-btn{
                        .tot{
                            display: flex;
                            justify-content: space-between;
                            border-top: 2px solid $mainColor;
                            margin-bottom: 10px;
                            div{
                                font-weight: 600;
                                font-size: 20px;
                            }
                        }
                        .buttons{
                            display: flex;
                            justify-content: center;
                            a{
                                border-radius: 30px;
                                padding: 10px 15px;
                                font-size: 16px;
                                font-weight: 600;
                                color: white;
                                text-decoration: none;
                                background: $mainColor;
                                margin-right: 20px;
                            }
                            .clear-cart{
                                cursor: pointer;
                                background-color: red;
                                border-radius: 30px;
                                padding: 10px 15px;
                                font-size: 16px;
                                font-weight: 600;
                                color: white;
                            }
                        }
                    }
                }
            }
            .active{
                opacity: 1;
                z-index: 10;
            }
        }
    }
}
</style>