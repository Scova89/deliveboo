<template>
	<div class="container">
		<form v-if="!dataShared.loaded && !dataShared.cart.length == 0">
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
            <div v-for="(error, index) in dataShared.errors" :key="index">
                <div class="mt-1">
                    <div class="alert alert-danger">{{error[0]}}</div>
                </div>
            </div>

			<button type="submit" class="btn btn-primary mb-2" @click.prevent="updateCart()" >
				Procedi con l'acquisto
			</button>
		</form>
		<v-braintree v-if="dataShared.loaded && !dataShared.cart.length == 0"
			:authorization="tokenGenerated"
			@success="onSuccess"
			@error="onError">
			<template #button="slotProps">
				<div
					ref="paymentBtnRef"
					@click="slotProps.submit"
				/>
			</template>
		</v-braintree>
		<button type="button" class="btn btn-primary mb-2" @click="beforeBuy()" v-if="dataShared.loaded && dataShared.cart.length > 0" :disabled="btnDisable == true">
			Procedi al pagamento
		</button>
	</div>
</template>

<script>
import dataShared from "../../dataShared.js";


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
			btnDisable: false,
		};
	},
	methods: {
		beforeBuy() {
			this.$refs.paymentBtnRef.click();
			this.btnDisable = true;
        },
		onSuccess(payload) {
			let nonce = payload.nonce;
			this.form.tokenClient = nonce;
			axios
				.post("/api/order/payment", this.form)
				.then((response) => {
					if (response.status == 200) {
						localStorage.clear("cart");
                        this.$router.push("checkout");
					}
				})
				.catch(function (error) {
					console.log(error);
				});
		},
		onError(error) {
			let message = error.message;
		},
		updateCart() {
			axios
				.post("/api/order/checkdata", this.form.client)
				.then((response) => {
                    if(response.data.success){
                        dataShared.loaded = true;
                    }
				})
                .catch(function (error) {
                    dataShared.errors = error.response.data.errors;
					if(error){
                        dataShared.loaded = false;
                    }
				});
			this.cart = JSON.parse(localStorage.getItem("cart"));
			this.form.cart = [];
			this.cart.forEach((element) => {
				this.form.cart.push({
					id: element.id,
					quantity: element.quantity,
				});
			});
			// dataShared.loaded = true;
		},
	},
	created() {
		axios
			.get("/api/order/generate")
			.then((response) => {
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