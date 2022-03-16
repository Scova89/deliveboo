<template>
    <header>
        <div class="box">
            <div class="left">
                <a href="/">
                    <div class="logo">
                        <img src="https://www.ilcannolo.com/wp-content/uploads/2020/09/food-ico_Tavola-disegno-1.png" alt="DeliveBoo Logo">
                    </div>
                    <div class="title">DeliveBoo</div>
                </a>
            </div>
            <div class="right">
                <a href="/login">Area riservata</a>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',

}
</script>

<style scoped lang="scss">
@import '../../../../sass/_variables.scss';
header{
    height: 300px;
    background-color: $mainColor;
    padding: 30px 10px;
    .box{
        display: flex;
        height: 80px;
        justify-content: space-between;
        .left{
            width: 50%;
            > a {
                display: flex;
                align-items: center;
                text-decoration: none;
                .logo{
                    img{
                        width: 70px;
                    }
                }
                .title{
                    color: white;
                    font-size: 25px;
                    font-weight: 700;
                    margin-left: 20px;
                    display: none;
                }
            }
        }
        .right{
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            a{  
                display: block;
                min-width: 161px;
                text-decoration: none;
                color: black;
                background-color: white;
                padding: 15px 30px;
                border-radius: 30px;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
                font-size: 16px;
                font-weight: 600;
                transition: 0.2s all;
            }
            a:hover{
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                color: $mainColor;
            }
        }
    }
    @media screen and (min-width: 576px) {
        padding: 30px 80px;
        .box {
            .left {
                display: flex;
                align-items: center;
                > a {
                    .title {
                        display: block;
                    }
                }
            }
        }
    }
    @media screen and (min-width: 768px) {
        
    }
}
</style>