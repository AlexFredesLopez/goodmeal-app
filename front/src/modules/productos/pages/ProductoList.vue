<template>

   
        <div class="rounded col-span-1 border shadow-xl bg-white p-6 w-3/4">
            <p class="font-semibold">
                {{producto.producto_nombre}}
            </p>
            <br>
            <p>
                {{producto.producto_descripcion}}
            </p>
            <br>
            <p>
                Stock : {{producto.producto_stock}}
            </p>
            <br>
            <p>
                Precio : {{producto.producto_precio}}
            </p>
        </div>
   
</template>

<script>
export default {
  props: ["producto"],
  data() {
    return {};
  },
  created() {},
};
</script>
