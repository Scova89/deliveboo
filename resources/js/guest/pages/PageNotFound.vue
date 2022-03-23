<template>
    <div>
        <div class="title">404 :(</div>
        <div class="message">Page not found!</div>
        <router-link :to="{ name: 'home' }"> Torna alla home </router-link>
    </div>
</template>

<script>
export default {
    name: 'PageNotFound'
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';

div {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    .title{
        color: $mainColor;
        font-size: 150px;
        font-weight: 600;
    }
    .message{
        font-size: 30px;
        font-weight: 600;
        margin: 50px 0px;
    }
    a{
        margin: 20px 0px;
        text-decoration: none;
        font-weight: 600;
        font-size: 20px;
        color: white;
        padding: 15px 25px;
        background-color: $mainColor;
        border-radius: 30px;
        transition: 0.3s all;
        &:hover{
            background-color: #60c5ff;
        }
    }
}
</style>