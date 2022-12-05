<template>
    <h1>Tienda : {{ id }}</h1>
</template>


<script>

export default{

    props: {
        id : {
            type: Number,
            required: true
        }
    },
    created() {

        console.log(this.$attrs);
    }
}
   
</script>