<script setup>
const props = defineProps(["message"]);
</script>
<template>
  <p class="error-message">{{ message }}</p>
</template>

<style scoped>
.error-message {
  background-color: rgb(150, 39, 39);
  color: white;
  padding: 10px;
  border-radius: 5px;
  width: 50%;
}
</style>
