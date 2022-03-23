<template>
    <div class="jumbo-img">
        <div class="jumbo-title col-lg-6 col-12">
            <div>Hai fame?</div>
            <div>Ordina da <span class="color">DeliveBoo</span>!!!</div>
        </div>
        <img class="col-lg-6 col-10" src="https://i.postimg.cc/8zM1m90K/delivery-auto-x2-1-digital-art-x4-removebg-1.png" alt="Jumbo vector">
        
    </div>
</template>

<script>
export default {
    name: 'Jumbotron',
    

}
</script>

<style scoped lang="scss">
@import '../../../../sass/_variables.scss';

    .jumbo-img{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        background: rgb(245,245,245);
        background: linear-gradient(164deg, rgba(245,245,245,1) 0%, rgba(56,182,255,0.5) 100%); 
        border-radius: 30px;
        margin: 20px;
        .jumbo-title{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            font-size: 20px;
            .color{
                color: $mainColor;
            }
        }
        img{
            margin: auto;
        }
    }
    @media screen and (min-width: 576px) {
        .jumbo-img{
            .jumbo-title{
                font-size: 35px;
                .color{
                }
            }
        }
    }

</style>