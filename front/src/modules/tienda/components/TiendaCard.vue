<template>
  <router-link :to="{name: 'tiendaDetalle', params: {id : tienda.id}}">
    <div class="bg-white border rounded shadow-lg">
      <div class="z-10">
        <div>
          <div class="relative">
            <img
              src="fondo.webp"
              class="absolute object-cover w-full h-20"
              alt=""
            />
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <div class="m-4">
        <div class="z-40">
          <span class="inline-block px-4 text-white bg-pink-400 rounded">{{
            tienda.horario_retiro
          }}</span>
          <h6 class="mt-4 text-xl font-semibold">{{ tienda.nombre }}</h6>
        </div>
      </div>
    </div>
  </router-link>
</template>

<script>
export default {
  props: ["tienda"],
  data() {
    return {};
  },
  created() {},
};
</script>
