<template>
  <router-link :to="{name: 'tiendaDetalle', params: {id : tienda.id}}">
    <div class="rounded border bg-white shadow-lg">
      <div class="z-10">
        <div>
          <div class="relative">
            <img
              src="fondo.webp"
              class="absolute h-20 w-full object-cover"
              alt=""
            />
          </div>
        </div>
      </div>
      <div class="m-4">
        <div class="z-40">
          <span class="bg-pink-400 inline-block px-4 rounded text-white">{{
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
