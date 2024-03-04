<script setup>
import { computed, reactive, ref } from "vue";
import Modal from "@/components/Modal.vue";
const openModal = ref(false);
</script>

<template>
  <button @click="openModal = !openModal">Abrir modal</button>
  <template v-if="openModal">
    <Modal>
      <template v-slot:header>Header Modal <br /></template>

      <template v-slot:body>Body Modal<br /> </template>

      <template v-slot:footer>Footer Modal<br /></template>
    </Modal>
  </template>
</template>
