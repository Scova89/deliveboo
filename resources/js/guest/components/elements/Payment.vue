<template>
	<div class="container">
		<form v-if="!dataShared.loaded">
			<div class="form-group">
				<label for="name">Inserisci nome e cognome</label>
				<input
					type="text"
					class="form-control"
					id="name"
					name="name"
					v-model="form.client.name"
				/>
			</div>

			<div class="form-group">
				<label for="email">Inserisci l'email</label>
				<input
					type="mail"
					class="form-control"
					id="email"
					name="email"
					v-model="form.client.email"
				/>
			</div>
			<div class="form-group">
				<label for="address">Indirizzo</label>
				<input
					type="text"
					class="form-control"
					id="address"
					name="address"
					v-model="form.client.address"
				/>
			</div>
			<div class="form-group">
				<label for="phone">Telefono</label>
				<input
					type="text"
					class="form-control"
					id="phone"
					name="phone"
					v-model="form.client.phone"
				/>
			</div>

			<button type="submit" class="btn btn-primary" @click="updateCart()">Procedi con l'acquisto</button>
		</form>
		<v-braintree
			v-else
			:authorization="tokenGenerated"
			@success="onSuccess"
			@error="onError"
		></v-braintree>
	</div>
</template>

<script>
import dataShared from '../../dataShared.js'

export default {
	name: "Payment",
	data() {
		return {
            dataShared,
			tokenGenerated: "",
			cart: [],
			form: {
				tokenClient: "",
				cart: [],
				client: {
					name: "",
					email: "",
					address: "",
					phone: "",
				},
			},
		};
	},
	methods: {
		onSuccess(payload) {
			let nonce = payload.nonce;
			this.form.tokenClient = nonce;
			axios
				.post("/api/order/payment", this.form)
				.then((response) => {
					if(response.status == 200){
                        localStorage.clear('cart');
                    }
				})
				.catch(function (error) {
					console.log(error);
				});
		},
		onError(error) {
			let message = error.message;
		},
        updateCart () {
            this.cart = JSON.parse(localStorage.getItem("cart"));
            this.form.cart = [];
            this.cart.forEach((element) => {
                this.form.cart.push({
                    id: element.id,
                    quantity: element.quantity,
                });
            });
            dataShared.loaded = true
        }
	},
	created() {
		axios
			.get("/api/order/generate")
			.then((response) => {
				console.log(response);
				this.tokenGenerated = response.data.token;
			})
			.catch(function (error) {
				console.log(error);
			});
	},
};
</script>

<style>
</style>