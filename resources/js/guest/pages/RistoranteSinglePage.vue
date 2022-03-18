<template>
    <div>
        <div class="info-ristorante">
            <h4>{{ristorante.name}}</h4>
            <div v-if="ristorante.image" class="img-box" style="width: 100%">
                <img :src="ristorante.image ? '/storage/' + ristorante.image : ''" :alt="ristorante.name">
            </div>
            <h5>Informazioni utili:</h5>
            <ul>
                <li>Città: {{ristorante.city}}</li>
                <li>Indirizzo: {{ristorante.address}}</li>
                <li>Telefono: {{ristorante.phone}}</li>
                <li>Cucina:
                    <ul>
                        <li v-for="typology in ristorante.typologies" :key="typology.id">{{typology.name}}</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="lista-prodotti">
            <h5>Lista prodotti:</h5>
            <ul v-for="product in ristorante.products" :key="product.id">
                <li v-if="product.visible && product.purchasable">
                    <router-link :to="{name: 'prodotto', params: {slug: product.slug, title: product.name}} ">
                        {{product.name}} prezzo: {{product.price}} €
                    </router-link>
                    <i class="fas fa-plus" @click="addCart(product)"></i>
                    <i class="fas fa-minus" @click="removeCart(product)"></i>
                </li>
            </ul>
        </div>
        
        <!-- <div class="modal fade" id="clearCart" tabindex="-1" role="dialog" aria-labelledby="deleteBoxLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Conferma l'eliminazione</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler eliminare il prodotto?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @onClick="clearCart">Si</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import dataShared from "../dataShared";

export default {
    name: 'RistoranteSinglePage',
    data() {
        return {
            ristorante: {},
            dataShared,
        }
    },
    methods: {
        clearCart: function (){
            localStorage.clear();
        },
        addCart: function(product) {
            let temp = product;
            if (dataShared.cart.length > 0) {
                for (let i = 0; i < dataShared.cart.length; i++) {
                    if(dataShared.cart.includes(temp.id)) {
                        console.log(dataShared.cart.includes(temp.id));
                        if (dataShared.cart[i].quantity > 0) {
                            dataShared.cart[i].quantity++;
                            console.log(dataShared.cart);
                        } else if (!dataShared.cart[i].quantity) {
                            console.log(dataShared.cart[i].quantity);
                            dataShared.cart[i].quantity = 1;
                            console.log(dataShared.cart);
                        }
                    } 
                    // else {
                    //     dataShared.cart.push(temp);
                    //     dataShared.cart[i].quantity;
                    //     console.log(dataShared.cart);
                    // }
                    
                }
            } else {
                dataShared.cart.push(temp);
                localStorage.setItem('Cart', JSON.stringify(dataShared.cart));
            }
        },
        removeCart: function(product) {
            var temp = product;
            dataShared.cart.pop(temp);
            localStorage.setItem('Cart', JSON.stringify(dataShared.cart));
        },
    },
    created() {
        axios.get(`/api/ristoranti/${this.$route.params.slug}`)
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
    }
}
</script>

<style>

</style>