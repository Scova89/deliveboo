<template>
<div>
    <div class="container-fluid">
        <router-view :key="$route.path"></router-view>
    </div>
</div>
</template>

<script>
export default {
    name: 'Main',

}
</script>

<style scoped lang="scss">
div{
    max-width: 1400px;
    margin: auto;
    .container-fluid{
        background-color: white;
        border-radius: 30px;
        min-height: 600px;
        position: relative;
        top: -100px; 
        padding: 5px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
        margin: 0px 20px;
        width: calc(100% - 40px);
        @media screen and (min-width: 576px) {
            padding: 30px;
        }
    }
}
</style>