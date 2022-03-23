<template>
	<div>
		<div class="info-ristorante">
			<div class="container-image">
				<div
					v-if="ristorante.image"
					class="img-box"
					style="width: 100%"
				>
					<img
						:src="
							ristorante.image
								? '/storage/' + ristorante.image
								: ''
						"
						:alt="ristorante.name"
					/>
				</div>
			</div>
			<div class="container-info">
				<h1>{{ ristorante.name }}</h1>
				<h5>Informazioni</h5>
				<ul>
					<li>Città: {{ ristorante.city }}</li>
					<li>Indirizzo: {{ ristorante.address }}</li>
					<li>Telefono: {{ ristorante.phone }}</li>
				</ul>
			</div>
		</div>
		<h5>Tipologie dei piatti</h5>
		<ul class="tipologies-list">
			<li v-for="typology in ristorante.typologies" :key="typology.id">
				{{ typology.name }}
			</li>
		</ul>
		<div class="lista-prodotti">
			<h5>Menù</h5>
			<ul v-for="product in ristorante.products" :key="product.id">
				<li v-if="product.visible && product.purchasable">
					<CardProduct :product="product" />
				</li>
			</ul>
		</div>

		<div
			class="modal fade"
			id="choose"
			tabindex="-1"
			role="dialog"
			aria-labelledby="deleteBoxLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Puoi ordinare da un solo ristorante alla volta!
						</h5>
						<button
							type="button"
							class="close"
							data-dismiss="modal"
							aria-label="Close"
						>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Non puoi ordinare da due ristoranti diversi
						contemporaneamente. Clicca su
						<strong>Salva scelta</strong> per
						<strong
							>eliminare gli elementi nel carrello e salvare
							l'ultimo prodotto scelto</strong
						>. Oppure clicca su <strong>Chiudi</strong> per
						<strong>non apportare modifiche</strong>.
					</div>
					<div class="modal-footer">
						<button
							type="button"
							class="btn btn-primary"
							data-dismiss="modal"
							@click="clearCartAndSave()"
						>
							Salva scelta
						</button>
						<button
							type="button"
							class="btn btn-secondary"
							data-dismiss="modal"
						>
							Chiudi
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import dataShared from "../dataShared";
import CardProduct from "../components/elements/CardProduct.vue";

export default {
	name: "RistoranteSinglePage",
	components: {
		CardProduct,
	},
	data() {
		return {
			ristorante: {},
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
	created() {
		dataShared.selectedCategories = [];

		axios
			.get(`/api/ristoranti/${this.$route.params.slug}`)
			.then((response) => {
				this.ristorante = response.data;
				// if(localStorage.length > 0){
				//     for (let i = 0; i < localStorage.length; i++) {
				//         for(let j = 0; j < response.data.products.length; j++){
				//             if(localStorage.key(i) == response.data.products[j].id){
				//             }
				//         }
				//     }
				// }
			})
			.catch((error) => {
				this.$router.push({ name: "page-404" });
			});
	},
};
</script>

<style lang='scss' scoped>
.info-ristorante {
	display: flex;
	flex-direction: column-reverse;
	gap: 40px;
	margin-bottom: 15px;
	justify-content: center;
	align-items: center;
	@media screen and (min-width: 768px) {
		flex-direction: row;
	}
	.container-image {
		> div {
			overflow: hidden;
			border-radius: 15px;
			max-width: 100%;
			@media screen and (min-width: 768px) {
				> img {
					max-height: 400px;
					max-width: 600px;
					object-fit: center;
				}
			}
			> img {
				max-height: 400px;
				max-width: 100%;
				object-fit: center;
			}
		}
	}
	.container-info {
		ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}
	}
}
.tipologies-list {
	display: flex;
	overflow-x: auto;
	padding: 15px;
	margin: 0;
	list-style: none;
	text-transform: capitalize;
	font-weight: 600;
	box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
		rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
	margin-bottom: 10px;
	border-radius: 10px;
	gap: 25px;
}
</style>