<template>
    <div>
        <h1>Transazione avvenuta con successo!!!</h1>
        <div>Il tuo ordine sta per arrivare.</div>
        <div>Segui la tua consegna via mail.</div>
        <router-link :to="{ name: 'home'}">
            Torna alla home
        </router-link>
    </div>
</template>

<script>
import dataShared from '../dataShared.js'

export default {
    name: "Checkout",
    data() {
        return {
            dataShared,
        }
    },
    created() {
        dataShared.checkout = false;
    },
}
</script>

<style>

</style>