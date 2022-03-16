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
            margin: 0 50px;
            max-width: calc(100% - 100px);
        }
        @media screen and (min-width: 992px) {
            margin: 0 100px;
            max-width: calc(100% - 200px);
        }
    }
    
</style>