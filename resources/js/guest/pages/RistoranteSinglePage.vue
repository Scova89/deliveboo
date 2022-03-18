<template>
    <div>
        <div class="info-ristorante">
            <h4>{{ristorante.name}}</h4>
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
                <li v-if="product.visible && product.purchasable"><router-link :to="{name: 'prodotto', params: {slug: product.slug, title: product.name}} ">{{product.name}}</router-link></li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'RistoranteSinglePage',
    data() {
        return {
            ristorante: {},
        }
    },
    created() {
        axios.get(`/api/ristoranti/${this.$route.params.slug}`)
        .then((response) => {
            this.ristorante = response.data;
        })
        .catch((error) => {
            this.$router.push({ name: "page-404" });
        });
    }
}
</script>

<style>

</style>