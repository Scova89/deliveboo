<template>
    <div>
        <h4>{{prodotto.name}}</h4>
        <div v-if="prodotto.image" class="img-box" style="width: 100%">
            <img :src="prodotto.image" :alt="prodotto.name">
        </div>
        <p>Descrizione: {{prodotto.description}}</p>
        <div>Intolleranze: {{prodotto.intolerance}}</div>
        <div>Prezzo: {{prodotto.price}} €</div>
    </div>
</template>

<script>
export default {
    name: 'Prodotto',
    data() {
        return {
            prodotto: {},
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
    }
}
</script>

<style>

</style>