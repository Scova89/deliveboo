<template>
	<div>
		<div class="info-ristorante">
			<div class="container-image" v-if="ristorante.image">
				<img :src="ristorante.image ? '/storage/' + ristorante.image : '' " :alt="ristorante.name"/>
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
			<ul>
				<li v-for="product in ristorante.products" :key="product.id">
					<CardProduct :product="product"  v-if="product.visible && product.purchasable"/>
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
	flex-direction: column;
	gap: 40px;
	margin-bottom: 15px;
	justify-content: center;
	align-items: center;
	flex-basis: 50%;
	@media screen and (min-width: 768px) {
		flex-direction: row;
	}
	h1 {
		margin-bottom: 40px;
	}
	.container-image {
		overflow: hidden;
		border-radius: 15px;
		width: 100%;
		> img {
			max-height: 400px;
			width: 100%;
			object-fit: center;
		}
		@media screen and (min-width: 768px) {
			width: 50%;
			height: 100%;
		}
		@media screen and (min-width: 1400px) {
			width: 30%;
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

.lista-prodotti {
	margin-top: 40px;
	ul {
		list-style: none;
		display: flex;
		gap: 15px;
		flex-direction: column;
		margin: 0;
		padding: 0;
	}
	@media screen and (min-width: 1400px) {
		ul {
			flex-wrap: wrap;
			flex-direction: row;
			li {
				width: calc((100% - 15px) / 2);
			}
		}
	}
}
</style>