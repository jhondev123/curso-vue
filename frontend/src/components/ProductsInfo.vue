<template>
  <div>
    <h2>Meu Componente</h2>
    <ul>
      <li v-for="item in items" :key="item.id">{{ item }}</li>
    </ul>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

// Definindo as propriedades esperadas pelo componente
const props = defineProps({
  items: {
    type: Array,
    required: true,
  },
});
</script>
