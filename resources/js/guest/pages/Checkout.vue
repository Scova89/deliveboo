<template>
	<div class="main-box">
		<h1>Transazione avvenuta con successo!!!</h1>
        <img src="https://www.linkpicture.com/q/imageedit_5_5120642073.gif">
        
		<h4>Il tuo ordine sta per arrivare. Segui la tua consegna via mail.</h4>
		<div class="order-container col-xl-7 col-lg-10 col-12">
            <div>Riepilogo ordine:</div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Prodotto</th>
						<th scope="col">Quantità</th>
						<th scope="col">Totale</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(cart, index) in dataShared.cart" :key="index">
						<td>{{ cart.name }}</td>
						<td>{{ cart.quantity }}</td>
						<td>{{ cart.price * cart.quantity }} €</td>
					</tr>
					<tr>
						<td><strong>Totale:</strong></td>
						<td></td>
						<td>{{total()}} €</td>
					</tr>
				</tbody>
			</table>
		</div>
        <a href="/">Torna alla home</a>
	</div>
</template>

<script>
import dataShared from "../dataShared.js";

export default {
	name: "Checkout",
	data() {
		return {
			dataShared,
		};
	},
	created() {
		dataShared.checkout = false;
	},
    methods: {
        total: function() {
            let total = 0;
            dataShared.cart.forEach(element => {
                total += element.price * element.quantity;
            });
            return total;
        },
    },
};
</script>

<style scoped lang="scss">
@import '../../../sass/_variables.scss';

div.main-box {
	display: flex;
	flex-direction: column;
	align-items: center;
	h1 {
		font-weight: 600;
		margin: 20px 0px;
	}
    img{
        margin: 20px;
    }
    h4{
        margin: 20px 0px;
    }
	.order-container {
        
        div{
            text-align: left;
            font-weight: 600;
            margin: 10px 0px;
            font-size: 18px;
        }
        margin: 20px 0px;
	}
    a{
        margin: 20px 0px;
        text-decoration: none;
        font-weight: 600;
        font-size: 20px;
        color: white;
        padding: 15px 25px;
        background-color: $mainColor;
        border-radius: 30px;
        transition: 0.3s all;
        &:hover{
            background-color: #60c5ff;
        }
    }
}
</style>