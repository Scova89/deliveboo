<template>
	<div class="card-product">
		<div class="container-image">
			<img :src="product.image ? '/storage/' + product.image : ''" alt="">
		</div>
		<div class="container-info">
			<router-link :to="{ name: 'prodotto', params: { slug: product.slug, title: product.name }}">
				{{ product.name }} 
			</router-link>
			<div>€ {{ product.price }}</div>
			<div class="container-btn-cart">
				<div class="cart-btn add" @click="addCart(product)">Aggiungi al carrello</div>
				<div class="cart-btn remove" @click="removeCart(product)">Rimuovi dal carrello</div>
			</div>
		</div>
	</div>
</template>

<script>
import dataShared from "../../dataShared";

export default {
	name: "CardProduct",
	props: {
		product: Object,
	},
	data() {
		return {
			dataShared,
		};
	},
	methods: {
		addCart: function (product) {
			let array = {
				quantity: 1,
				id: product.id,
				name: product.name,
				price: product.price,
				user_id: product.user_id,
			};
			let index = 0;
			dataShared.key++;

			if (
				localStorage.getItem("cart") == "[]" ||
				localStorage.getItem("cart") == null ||
				dataShared.cart[0].user_id == array.user_id
			) {
				if (dataShared.cart[0] != null) {
					dataShared.cart.forEach((element) => {
						if (element.id == array.id) {
							element.quantity++;
							index = element.id;
							localStorage.setItem(
								"cart",
								JSON.stringify(dataShared.cart)
							);
						}
					});
					if (index != array.id) {
						dataShared.cart.push(array);
						localStorage.setItem(
							"cart",
							JSON.stringify(dataShared.cart)
						);
					}
				} else {
					dataShared.cart[0] = array;
					localStorage.setItem(
						"cart",
						JSON.stringify(dataShared.cart)
					);
				}
			} else {
				dataShared.checkCart = true;
				dataShared.chooseData = array;
				$("#choose").modal("show");
			}
		},

		removeCart: function (product) {
			let array = {
				quantity: 1,
				id: product.id,
				name: product.name,
				price: product.price,
				user_id: product.user_id,
			};
			dataShared.key++;

			dataShared.cart.forEach((element, index) => {
				if (element.id == array.id && element.quantity == 1) {
					dataShared.cart.splice(index, 1);
					localStorage.setItem(
						"cart",
						JSON.stringify(dataShared.cart)
					);
				} else if (element.id == array.id && element.quantity > 1) {
					element.quantity--;
					localStorage.setItem(
						"cart",
						JSON.stringify(dataShared.cart)
					);
				}
			});
		},
        clearCartAndSave() {
			localStorage.clear("cart");
			dataShared.cart = [];
			dataShared.cart[0] = dataShared.chooseData;
			localStorage.setItem("cart", JSON.stringify(dataShared.cart));
		},
	},
};
</script>

<style lang='scss' scoped>
@import "../../../../sass/_variables.scss";

.card-product {
	box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
	border-radius: 15px;
	padding: 10px;
	display: flex;
	gap: 15px;
	flex-direction: column;
	align-items: center;

	@media screen and (min-width: 576px) {
		flex-direction: row;
		
	}
	.container-image {
		overflow: hidden;
		border-radius: 10px;
		width: 100%;

		img {
			width: 100%;
		}
		@media screen and (min-width: 576px) {
			width: calc(100% / 4);

		}
		@media screen and (min-width: 1400px) {
			width: calc(100% / 3);
			img {
				width: 100%;
				height: 160px;
				object-fit: contain;
			}
		}
	}
	.container-info {
		display: flex;
		flex-direction: column;
		gap: 10px;
		justify-content: center;
		.container-btn-cart {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			gap: 5px;
			.cart-btn {
				display: inline-block;
				padding: 10px;
				cursor: pointer;
				border-radius: 10px;
				color: white;
				box-shadow: rgba(0, 0, 0, 0.24) 0px 1px 3px;
				margin: 0;
				font-weight: 600;
				&.add {
					background-color: $mainColor;

				}
				&.remove {
					background-color: lightgray;
				}
			}
		}
	}
	
}
</style>