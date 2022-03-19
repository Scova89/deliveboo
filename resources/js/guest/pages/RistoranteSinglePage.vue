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
        addCart: function(product) {
            let array = {quantity: 1, id: product.id, name: product.name, price: product.price};
            let index = 0;
            
            if(dataShared.cart[0] != null) {
                console.log(dataShared.cart);
                dataShared.cart.forEach(element => {
                    if(element.id == array.id){
                        element.quantity++;
                        index = element.id;
                        localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                    }
                });
                if(index != array.id){
                    dataShared.cart.push(array);
                    localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                }
            } else {
                dataShared.cart[0] = array;
                console.log(dataShared.cart);
                localStorage.setItem('cart', JSON.stringify(dataShared.cart));
            }
        },

        removeCart: function(product) {
            let array = {quantity: 1, id: product.id, name: product.name, price: product.price};

            dataShared.cart.forEach((element, index) => {
                console.log(element);
                if(element.id == array.id && element.quantity == 1){
                    dataShared.cart.splice(index, 1);
                    console.log('2');
                    localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                } else if(element.id == array.id && element.quantity > 1)
                {
                    element.quantity--;
                    localStorage.setItem('cart', JSON.stringify(dataShared.cart));
                    console.log('3');
                }
            });
        },
        clearCart: function (){
            localStorage.clear();
        },
    },
    created() {
        dataShared.selectedCategories = [];

        

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