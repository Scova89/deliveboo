<template>
  <div class="single-card">
    <img :src="categoria.image ? 'storage/' + categoria.image : ''" :alt="categoria.name">
  </div>
</template>

<script>

export default {
  name: "Card",
  props: {
    categoria: Object,
    
  }
}
</script>

<style scoped lang="scss">
  .single-card{
    img {
      width: 100%;
      height: 120px;
      object-fit: cover;
    }
  }

</style>