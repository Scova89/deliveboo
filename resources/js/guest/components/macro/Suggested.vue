<template>
<div>
    <h4>I ristoranti più popolari</h4>
    <div class="box-card">
        <div class="cardBig col-12 col-sm-6 col-lg-3" v-for="(ristorante, index) in ristoranti" :key="index">
            <div class="container-image">
                <router-link :to="{name: 'ristorante', params: {slug: ristorante.slug, title: ristorante.name}} ">
                    <img :src="ristorante.image ? 'storage/' + ristorante.image : ''" :alt="ristorante.name"/>
                </router-link>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import dataShared from "../../dataShared";

export default {
    name: 'suggested',
    data() {
        return {
            ristoranti : [],
            dataShared
        }
    },
    mounted() {
        axios.get(`/api/ristoranti`)
        .then((response) => {
            response.data.forEach(element => {
                if(element.name == 'McDonald\'s' || element.name == 'KFC' || element.name == 'Burger King' || element.name == 'Old Wild West')
                this.ristoranti.push(element);

            });
            dataShared.caricamentoSuggested = true;
        })
        .catch((error) => {
            this.$router.push({ name: "page-404" });
        });
    },
}
</script>

<style scoped lang='scss'>
@import '../../../../sass/_variables.scss';
    h4{
        margin: 30px 0px 20px 0px;
    }
    .box-card{
        display: flex;
        flex-wrap: wrap;
        .cardBig{ 
            height: 250px;
            padding: 10px;
            .container-image{
                aspect-ratio: 16 / 9;
                margin: 0px 10px;
                border-radius: 50%;
                overflow: hidden;
                img{
                    border-radius: 50%;
                    border: 4px solid $mainColor;
                    height: 100%;
                    position: relative;
                    left: 50%;
                    padding: 5px;
                    transform: translateX(-50%);
                    transition: 0.3s all;
                    cursor: pointer;
                }
                img:hover{
                    border: 4px solid rgb(67, 208, 255);
                    filter: brightness(0.8);
                }
            }
        }
    }
    @media screen and (min-width: 992px) {
        .cardBig{
            height: 170px !important;
        }
        
    }
</style>