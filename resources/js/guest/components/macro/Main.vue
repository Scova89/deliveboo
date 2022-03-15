<template>
    <div class="container">
        <router-view :key="$route.path"></router-view>
    </div>
</template>

<script>
export default {
    name: 'Main',

}
</script>

<style scoped lang="scss">
    .container{
        background-color: white;
        border-radius: 30px;
        min-height: 600px;
        position: relative;
        top: -100px; 
        padding: 30px;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
    }
</style>