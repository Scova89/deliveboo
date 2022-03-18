<template>
    <div>
        <h4>{{prodotto.name}}</h4>
        <p>Descrizione: {{prodotto.description}}</p>
        <div>Intolleranze: {{prodotto.intolerance}}</div>
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