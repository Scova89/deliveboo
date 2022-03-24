<template>
    <div>
        <ul class="list-unstyled row">
            <li v-for="(restaurant, index) in dataShared.restaurants" :key="index" class="col-12 col-lg-6">
                <router-link :to="{name: 'ristorante', params: {slug: restaurant.slug, title: restaurant.name}} ">
                    <div class="box-image">
                        <img :src="restaurant.image ? 'storage/' + restaurant.image : ''" :alt="restaurant.name"/>
                    </div>
                    <div class="name">
                        {{restaurant.name}}
                    </div>
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
import dataShared from "../../dataShared.js"

export default {
    name: "Ristoranti",
    data(){
        return{
            
            dataShared,
        }
    },
    methods: {
        stringify: function() {
            let temp = dataShared.selectedCategories;
            axios.get('/api/ristoranti/search/'+temp)
            .then((response)=> {
                dataShared.restaurants = [];
                dataShared.restaurants = response.data;
                dataShared.caricamentoRestaurants = true
            })
            .catch((error) =>{
                this.$router.push({
                    name: 'page-404'
                })
            });
        }
    },
    created() {
        
    }

}
</script>

<style scoped lang="scss">
@import "../../../../sass/_variables.scss";

    div{
        ul{
            li{
                a{  
                    display: flex;
                    align-items: center;
                    height: 100px;
                    list-style: none;
                    margin: 10px 0px;
                    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
                    border-radius: 15px;
                    text-decoration: none;
                    color: black;
                    font-size: 25px;
                    transition: 0.3s all;
                    .box-image{
                        margin: 10px;
                        overflow: hidden;
                        border-radius: 10px;
                        img{
                            object-fit: cover;
                            object-position: center center;
                            height: 80px;
                            width: 130px;

                        }
                    }
                    .name{
                        margin-left: 50px;
                    }
                }
            }
            li:hover{
                a{
                    background-color: rgba(233, 233, 233, 0.25);
                    color: $mainColor;
                }
            }
        }
    }
</style>