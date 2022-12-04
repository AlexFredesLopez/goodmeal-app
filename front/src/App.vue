<script setup>
import { ref, computed } from 'vue';


const count = ref(0)

const arrayCount = ref([])

const increment = () => {
  count.value++
}
const decrement = () => {
  count.value--
}

const reset = () => {
  count.value = 0;
}

const classComputed = computed(() => {

  if(count.value === 0){
    return 'zero'
  }

  return count.value > 0 ? 'positive': 'negative'
})


const addToArray = () => {
  arrayCount.value.push(count.value)

}

const checkIfExist = computed(()  => {

  const arraySearch = arrayCount.value.find( (num) => num === count.value)

  if(arraySearch != null){
    return true
  }
  return false;
  
})

</script>

<template>

  <button @click="increment">Aumentar</button>
  <button @click="decrement">Decrement</button>
  <button @click="reset">Reset</button>
  <button @click="addToArray" :disabled="checkIfExist">Agregar</button>
  <h2 :class="classComputed"> {{ count }} </h2>

  <ul>
    <li
      v-for="nums in arrayCount"
      :key="nums"

    >
    {{nums}}
    </li>
  </ul>
</template>


<style>
h1 {
   color: red;
 }

 .positive {
   color: green;
 }

 .negative {
   color: red !important;
 }

 .zero {
   color: peru;
 }
</style>