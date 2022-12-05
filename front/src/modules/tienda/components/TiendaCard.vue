<template>

    
        <div class="rounded border bg-white shadow-lg ">
           <div class="m-4">
            <span class="bg-pink-400 inline-block px-4 rounded text-white">{{tienda.horario_retiro}}</span>
            <h6 class="mt-4 text-xl font-semibold">{{tienda.nombre}}</h6>
           </div>
        </div>
    

</template>


<script>
export default {

    props: {
        tienda : {
            type: Object,
            required: true
        }
    },
    data() {
        
    },
    created() {

        
    },
}
    
</script>