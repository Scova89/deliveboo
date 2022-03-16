<template>
  <div class="single-card" @click="active()">
    <img
      :class="isActive ? 'active' : ''"
      :src="categoria.image ? 'storage/' + categoria.image : ''"
      :alt="categoria.name"
    />
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
  img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    cursor: pointer;
    margin-top: 10px;
    border-radius: 12px;
    transition: 0.5s all;
  }
  img:hover {
    filter: brightness(0.5);
  }
  h5 {
    text-align: center;
    margin-top: 10px;
    color: rgba(0, 0, 0, 0.7);
  }
  .active {
    filter: brightness(0.5);
  }
}
</style>