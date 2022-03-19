<template>
	<div>
		<div  class="container-cartIcon">
			<div class="number-element" v-if="dataShared.cart[0] != null">
				{{dataShared.cart.length}}
			</div>
			<i @click="cartPopup()" class="fa-solid fa-cart-shopping cart"></i>
			<div class="container-popup" :class="cartActive ? 'active' : ''">
				<div class="list-product">
					<ul v-if="dataShared.cart[0] != null">
						<li class="row" v-for="(element, index) in dataShared.cart" :key="index" >
							<div class="col-5">{{ element.name }}</div>
							<div class="col-2">Q. {{element.quantity}}</div>
							<div class="col-3">
								<i class="fas fa-plus" @click="addCart(element)"></i>
                    			<i class="fas fa-minus" @click="removeCart(element)"></i>
							</div>
							<div class="col-2">€ {{element.price * element.quantity}}</div>

						</li>
					</ul>
					<h2 v-else>Il carrello è vuoto</h2>
				</div>
				<router-link
					class="goCart-btn"
					:to="{ name: 'carrello', params: { title: 'carrello' } }"
				>
					<div>Vai al carrello</div>
				</router-link>
			</div>
		</div>
	</div>
</template>

<script>
import dataShared from "../../dataShared";
export default {
	name: "CartIcon",
	data() {
		return {
			cartActive: false,
			dataShared,
		};
	},
	methods: {
		cartPopup: function () {
			this.cartActive  ? (this.cartActive = false) : (this.cartActive = true);
		},
		addCart: function(product) {
            product.quantity++;
			localStorage.setItem('cart', JSON.stringify(dataShared.cart));
        },

        removeCart: function(product) {
            let array = {quantity: 1, id: product.id, name: product.name, price: product.price};
			console.log(dataShared.cart);
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
};
</script>

<style scoped lang="scss">
@import "../../../../sass/_variables.scss";

.list-product {

	> ul {
		list-style: none;
		margin: 0;
		padding: 0;
		font-weight: 600;
		li {
			i {
				padding: 3px;
				background: $mainColor;
				border-radius: 50%;
			}
		}
	}
	h2 {
		text-align: center;
	}
}

.container-cartIcon {
	position: relative;
	.number-element {
		position: absolute;
		border-radius: 50%;
		top: 0;
		right: 10px;
		background: tomato;
		font-weight: 600;
		min-width: 20px;
		min-height: 20px;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.container-popup {
		padding: 15px;
		background: white;
		position: absolute;
		width: 400px;
		height: 500px;
		z-index: 99;
		top: 110%;
		right: 0;
		display: none;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
		border-radius: 15px;
		&.active {
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}
		a.goCart-btn {
			align-self: center;
			text-decoration: none;
			color: black;
			> div {
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
	i.cart {
		display: block;

		padding: 17px;
		font-size: 20px;
		background-color: white;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
		border-radius: 50%;
		margin-right: 20px;
		transition: 0.3s all;
	}
	i.cart:hover {
		color: $mainColor;
	}
}
</style>