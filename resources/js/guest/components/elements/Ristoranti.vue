<template>
    <div>
        <button @click="stringify">cerca</button>
        Lista ristoranti:
        <ul>
            <li v-for="restaurant in restaurants.users" :key="restaurant.id">
                {{restaurant.name}}
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
            restaurants : [],
            dataShared,
        }
    },
    methods: {
        stringify: function() {
            let temp = dataShared.selectedCategories;
            console.log(temp);
            axios.get('/api/ristoranti/search/'+temp)
            .then((response)=> {
                this.restaurants = response.data;
                log(response.data);
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