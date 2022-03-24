<template>
    <div>
        <Jumbotron/>
        <div v-if="!dataShared.caricamentoTypologies && !dataShared.caricamentoSuggested &&  !dataShared.caricamentoRestaurants" class="container-loading">
            <div class="sk-chase" >
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
            <h2>Loading...</h2>
        </div>
        <div v-else>
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
            dataShared.caricamentoTypologies = true;
        })
        .catch((error) => {
            this.$router.push({ name: "page-404" });
        });
    },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";

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
.container-loading{
    margin: 50px 0;
        h2{
            color: $mainColor;
            margin-top: 20px;
        }
    display: flex;
    align-items: center;
    flex-direction: column;
}
.sk-chase {
    width: 100px;
    height: 100px;
    position: relative;
    animation: sk-chase 2.5s infinite linear both;
    
}

.sk-chase-dot {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0; 
    animation: sk-chase-dot 2.0s infinite ease-in-out both; 
}

.sk-chase-dot:before {
    content: '';
    display: block;
    width: 25%;
    height: 25%;
    background-color: $mainColor;
    border-radius: 100%;
    animation: sk-chase-dot-before 2.0s infinite ease-in-out both; 
}

.sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
.sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
.sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
.sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
.sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
.sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
.sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
.sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
.sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
.sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
.sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
.sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }

@keyframes sk-chase {
    100% { transform: rotate(360deg); } 
}

@keyframes sk-chase-dot {
    80%, 100% { transform: rotate(360deg); } 
}

@keyframes sk-chase-dot-before {
    50% {
        transform: scale(0.4); 
    } 100%, 0% {
        transform: scale(1.0); 
    } 
}
</style>