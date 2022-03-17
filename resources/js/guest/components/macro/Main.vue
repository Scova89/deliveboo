<template>
    <div class="container-fluid">
        <router-view :key="$route.path"></router-view>
    </div>
</template>

<script>
export default {
    name: 'Main',

}
</script>

<style scoped lang="scss">
    .container-fluid{
        background-color: white;
        border-radius: 30px;
        min-height: 600px;
        position: relative;
        top: -100px; 
        padding: 30px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
        margin: 0 15px;
        max-width: calc(100% - 30px);
        @media screen and (min-width: 576px) {
            margin: 0 auto;
            max-width: calc(100% - 100px);
        }
        @media screen and (min-width: 992px) {
            margin: 0 auto;
            max-width: calc(100% - 200px);
        }
        @media screen and (min-width: 1200px) {
            margin: 0 auto;
            max-width: calc(1200px - 200px);
        }
        @media screen and (min-width: 1400px) {
            margin: 0 auto;
            max-width: calc(1400px - 20px);
        }
        @media screen and (min-width: 1600px) {
            margin: 0 auto;
            max-width: calc(1600px - 20px);
        }
    }
    
</style>