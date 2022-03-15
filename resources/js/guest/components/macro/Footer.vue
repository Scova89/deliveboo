<template>
    <footer>
        <div class="col-12 col-xl-2 link">
            <div class="name">
                Filippo Rossi
            </div>
            <div class="box-link">
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="col-12 col-xl-2 link">
            <div class="name">
                Ferdinando Letizia
            </div>
            <div class="box-link">
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="col-12 col-xl-2 link">
            <div class="name">
                Francesco Scovacricchi
            </div>
            <div class="box-link">
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="col-12 col-xl-2 link">
            <div class="name">
                Alessandro Mandaglio
            </div>
            <div class="box-link">
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="col-12 col-xl-2 link">
            <div class="name">
                Alessandro Luisi
            </div>
            <div class="box-link">
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',

}
</script>

<style scoped lang="scss">
@import '../../../../sass/_variables.scss';
    footer{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        background-color: $mainColor;
        min-height: 120px;
        padding: 20px;
        .link{
            text-align: center;
            height: 30px;
            color: white;
            font-size: 20px;
            font-weight: 700;
            height: 100px;
            .box-link{
                display: flex;
                justify-content: center;
                gap: 20px;
                margin: 10px 0px;
                font-size: 25px;
                a{
                    text-decoration: none;
                    color: white;
                    transition: 0.2s all;
                }
                a:hover{
                    color: rgb(185, 185, 185);
                }
            }
        }
    }
</style>