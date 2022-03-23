<template>
	<div>
		<router-link
			:to="{
				name: 'prodotto',
				params: { slug: product.slug, title: product.name },
			}"
		>
			{{ product.name }} prezzo: {{ product.price }} €
		</router-link>
		<i class="fas fa-plus" @click="addCart(product)"></i>
		<i class="fas fa-minus" @click="removeCart(product)"></i>
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
	},
};
</script>

<style lang='scss' scoped>
</style>