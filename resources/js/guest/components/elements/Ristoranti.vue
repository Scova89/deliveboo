<template>
    <div>
        Lista ristoranti:
        <ul>
            <li v-for="(restaurant, index) in dataShared.restaurants" :key="index">
                
                <router-link :to="{name: 'ristorante', params: {slug: restaurant.slug, title: restaurant.name}} ">{{restaurant.name}}</router-link>
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

</style>