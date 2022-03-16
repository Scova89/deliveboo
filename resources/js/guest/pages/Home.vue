<template>
    <div>
        <h4>Scegli una categoria:</h4>
        <div class="box-card">
            <div v-for="categoria in categorie" :key="categoria">
                <Card/>

            </div>
        </div>
    </div>
    
</template>

<script>
import Card from './elements/Card.vue'

export default {
    name: 'Home',
    components: {
        Card
    },
    data() {
        return{
            categorie:[]
        }
    },
    created(){
        axios.get('/api/categorie')
        .then((response) => {
        this.categorie = response.data;
            }).catch( (error)=> {
                this.$router.push({name: 'page-404'})
            })
    },

}
</script>

<style scoped lang="scss">
    .box-card{
        display: flex;
        width: 100%;
    }
    
</style>