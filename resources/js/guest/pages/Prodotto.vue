<template>
    <div>
        <div class="container-top">
            <div class="info-box col-12 col-md-6">
                <h4 class="">{{prodotto.name}}</h4>
                <div>Descrizione: {{prodotto.description}}</div>
                <div>Intolleranze: {{prodotto.intolerance}}</div>
                <div>Prezzo: {{prodotto.price}} €</div>
                <div class="container-btn-cart">
                    <div class="cart-btn add" @click="addCart(prodotto)">Aggiungi al carrello</div>
                    <div class="cart-btn remove" @click="removeCart(prodotto)">Rimuovi dal carrello</div>
                </div>
            </div>
            <div v-if="prodotto.image" class="img-box col-12 col-md-6">
                <img :src="prodotto.image ? '/storage/' + prodotto.image : ''" :alt="prodotto.name">
            </div>
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
import dataShared from "../dataShared.js"

export default {
    name: 'Prodotto',
    data() {
        return {
            prodotto: {},
            dataShared,
        }
    },
    created() {
        axios.get(`/api/prodotti/${this.$route.params.slug}`)
        .then((response) => {
            this.prodotto = response.data;
        })
        .catch((error) => {
            this.$router.push({ name: "page-404" });
        });
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
}
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";

    div{
        .container-top{
            display: flex;
            flex-wrap: wrap;
            .info-box{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                font-size: 25px;
                div{
                    margin: 10px 0px;
                }
                h4{
                    font-weight: 600;
                    font-size: 35px;

                }
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
            .img-box{
                height: 500px;
                overflow: hidden;
                object-position: center;
                text-align: center;
                img{
                    border-radius: 20px;
                    height: 100%;
                    object-fit: cover;
                    width: 100%;
                }
            }
        }
    }
</style>