<template>
  <button @click="$emit('addCount')">Add Count</button>
</template>

<script setup>
const emit = defineEmits(["addCount"]);
function add() {
  emit("addCount");
}
</script>
