<template>
    <div>
        <div class="categorie">
            <h4>Scegli una categoria:</h4>
            <div class="box-card">
                <Card
                @search="saveCategory"
                    v-for="categoria in dataShared.categorie"
                    :key="categoria.id"
                    :categoria="categoria"
                />
            </div>
        </div>
        <div class="ristoranti">
            <h4>Scegli un ristorante:</h4>
            <div class="box-ristoranti">
                <Ristoranti/>
            </div>
        </div>
    </div>
</template>

<script>
import Card from "../components/elements/Card.vue";
import Ristoranti from "../components/elements/Ristoranti.vue";

import dataShared from "../dataShared";

export default {
    name: "Home",
    components: {
        Card,
        Ristoranti
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
    .categorie{
        h4 {
            margin-bottom: 10px;
        }
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