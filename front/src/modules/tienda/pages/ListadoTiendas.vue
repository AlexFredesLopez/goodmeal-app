<template>
  <div class="mx-12 my-12">
    <div class="">
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 px-4-">
        <TiendaCard
          v-for="tienda in tiendas"
          :tienda="tienda"
          :key="tienda.id"
        />
      </div>
    </div>
  </div>
</template>

<script>
import TiendaCard from "../components/TiendaCard.vue";

export default {
  components: {
    TiendaCard,
  },
  data() {
    return {
      tiendas: null,
    };
  },
  created() {
    this.getListadoTiendas();
  },

  methods: {
    async getListadoTiendas() {
      const tiendas = await fetch(`http://localhost:8081/api/tiendas`).then(
        (r) => r.json()
      );

      this.tiendas = tiendas.data;
    },
  },
};
</script>
