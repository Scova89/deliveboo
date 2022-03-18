<template>
    <div :class="isActive ? 'active' : ''" class="single-card col-lg-2 col-md-4 col-sm-6 col-12" @click="active(), $emit('search', categoria.name)">
        <div class="container-image">
            <img :src="categoria.image ? 'storage/' + categoria.image : ''" :alt="categoria.name"/>
        </div>
        <h5>{{ categoria.name }}</h5>
    </div>
</template>

<script>

export default {
    name: "Card",
    data() {
        return {
            isActive: false,
        };
    },
    props: {
        categoria: Object,
    },
    methods: {
        active: function () {
            this.isActive ? (this.isActive = false) : (this.isActive = true);
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../../../sass/_variables.scss";
.single-card {
    display: flex;
    flex-direction: column;
    padding: 5px;
    .container-image {
        aspect-ratio: 16 / 9;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 10px;
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
            transition: 0.5s all;
        }
    }
    &:hover {
        .container-image {
            border: 5px solid $mainColor;
            img {
                transform: scale(1.1);
                filter: brightness(0.5);
            }
        }
    }
    h5 {
        text-align: center;
        margin-top: 10px;
        color: rgba(0, 0, 0, 0.7);
        text-transform: capitalize;
    }
    &.active {
        .container-image {
            border: 5px solid $mainColor;
            img {
                transform: scale(1.1);
                filter: brightness(0.5);
            }
        }
    }
}
</style>