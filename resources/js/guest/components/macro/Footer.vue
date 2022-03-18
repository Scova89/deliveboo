<template>
    <footer>
        <div class="footer-container">
            <div class="col-12 col-xl-2 link">
                <div class="name">
                    Filippo Rossi
                </div>
                <div class="box-link">
                    <a href="https://github.com/FilippoR00" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/filippo-rossi" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-12 col-xl-2 link">
                <div class="name">
                    Ferdinando Letizia
                </div>
                <div class="box-link">
                    <a href="https://github.com/ferdlet" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/ferdinando-letizia" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-12 col-xl-2 link">
                <div class="name">
                    Francesco Scovacricchi
                </div>
                <div class="box-link">
                    <a href="https://github.com/Scova89" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="#" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-12 col-xl-2 link">
                <div class="name">
                    Alessandro Mandaglio
                </div>
                <div class="box-link">
                    <a href="https://github.com/AlessandroMandaglio30" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/alessandro-mandaglio-9b4935232/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-12 col-xl-2 link">
                <div class="name">
                    Alessandro Luisi
                </div>
                <div class="box-link">
                    <a href="#" target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/alessandro-luisi-39b44a172" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
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
        background-color: $mainColor;
        .footer-container{
            min-height: 120px;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 1400px;
            margin: 0px auto;
            .link{
                text-align: center;
                color: white;
                font-size: 20px;
                font-weight: 700;
                margin-bottom: 20px;
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
    }
</style>