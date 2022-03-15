<template>
    <div>
        <router-view :key="$route.path"></router-view>
    </div>
</template>

<script>
export default {
    name: 'Main',

}
</script>

<style scoped lang="scss">

</style>