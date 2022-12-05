<template>
  <div class="flex justify-center mt-12">
    <div class="rounded border shadow-lg w-72 p-12">
      <h1 class="text-left font-semibold">{{ tienda.nombre }}</h1>
    </div>
  </div>

  <div class="gird grid-cols-3 flex flex-row gap-4 mx-12 mt-12">
    <ProductoList
      v-for="producto in tienda.products"
      :producto="producto"
      :key="producto.id"
    />
  </div>
</template>

<script>
import ProductoList from "../../productos/pages/ProductoList.vue";

export default {
  components: {
    ProductoList,
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      tienda: [
        (nombre) => null,
        (direccion) => null,
        (telefono) => null,
        (horario_retiro) => null,
      ],
    };
  },
  created() {
    this.getTiendaById();
  },
  methods: {
    async getTiendaById() {
      const tienda = await fetch(
        `http://localhost:8081/api/tiendas/${this.id}`
      ).then((r) => r.json());

      this.tienda = tienda.tienda[0];

    },
  },
};
</script>
