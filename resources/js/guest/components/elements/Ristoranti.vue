<template>
    <div>
        <button @click="stringify">cerca</button>
        Lista ristoranti:
        <ul>
            <li v-for="(restaurant, index) in dataShared.restaurants" :key="index">
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
                console.log(response.data);
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