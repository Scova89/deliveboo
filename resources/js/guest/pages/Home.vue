<template>
    <div>
        <Jumbotron/>
        <Suggested/>
        <div class="categorie">
            <h4>Scegli una categoria</h4>
            <div class="box-card">
                <Card @search="saveCategory" v-for="categoria in dataShared.categorie" :key="categoria.id" :categoria="categoria" />
            </div>
        </div>
        <div class="ristoranti" v-if="dataShared.restaurants.length > 0">
            <h4>Risultato ricerca</h4>
            <div class="box-ristoranti">
                <Ristoranti/>
            </div>
        </div>
    </div>
</template>

<script>
import Card from "../components/elements/Card.vue";
import Ristoranti from "../components/elements/Ristoranti.vue";
import Jumbotron from '../components/macro/Jumbotron.vue'
import Suggested from '../components/macro/Suggested.vue'

import dataShared from "../dataShared";

export default {
    name: "Home",
    components: {
        Card,
        Ristoranti,
        Jumbotron,
        Suggested,
    },
    data() {
        return {
            dataShared,
        };
    },
    methods: {
        saveCategory: function (data) {
            if (dataShared.selectedCategories.includes(data)) {
                let index = dataShared.selectedCategories.indexOf(data)
                dataShared.selectedCategories.splice(index, 1);
            } else {
                dataShared.selectedCategories.push(data);
            }
        }
    },
    created() {
        // localStorage.setItem();

        axios.get("/api/categorie")
        .then((response) => {
            dataShared.categorie = response.data;
        })
        .catch((error) => {
            this.$router.push({ name: "page-404" });
        });
    },
};
</script>

<style scoped lang="scss">
div{
    h4 {
        margin: 20px 0px;
    }
    .categorie{
        .box-card {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
    }
    // .ristoranti{

    // }
}
</style>