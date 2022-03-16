<template>
  <div>
    <h4>Scegli una categoria:</h4>
    <div class="box-card">
      <Card
        v-for="categoria in dataShared.categorie"
        :key="categoria.id"
        :categoria="categoria"
      />
    </div>
  </div>
</template>

<script>
import Card from "./elements/Card.vue";
import dataShared from "../dataShared";

export default {
  name: "Home",
  components: {
    Card,
  },
  data() {
    return {
      dataShared,
    };
  },
  created() {
    axios
      .get("/api/categorie")
      .then((response) => {
        dataShared.categorie = response.data;
      })
      .catch((error) => {
        this.$router.push({ name: "page-404" });
      });
  },
};
</script>

<style scoped lang="scss">
.box-card {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  gap: 10px;
  > * {
    width: calc((100% - 40px) / 5);
  }
}
h4 {
  margin-bottom: 10px;
}
</style>