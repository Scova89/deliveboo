<template>
    <div class="jumbo-img">
        <img src="https://i.pinimg.com/originals/a4/f8/90/a4f89051e4c7131a1d1c227f05648b96.png" alt="Jumbo vector">
    </div>
</template>

<script>
export default {
    name: 'Jumbotron',
    

}
</script>

<style scoped lang="scss">
    .jumbo-img{
        margin: 0 auto;
            img{
                width: 70%;
            }
    }


    @media screen and (min-width: 576px) {
        .jumbo-img{
            margin: 0 auto;
            img{
               width: 70%;
            }
        }
    }

</style>