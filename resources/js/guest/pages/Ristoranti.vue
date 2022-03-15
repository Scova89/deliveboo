<template>
    <div>
        Lista ristoranti:
        <ul>
            <li v-for="restaurant in restaurants" :key="restaurant.id">
                {{restaurant.name}}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Ristoranti",
    data(){
        return{
            restaurants : []
        }
    },
    created() {
        axios.get('/api/ristoranti')
        .then((response)=> {
            this.restaurants = response.data;
        })
        .catch((error) =>{
            this.$router.push({
                name: 'page-404'
            })
        });
    }

}
</script>

<style scoped lang="scss">

</style>