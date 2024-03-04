<template>
  <div class="px-4 py-4">
    <p>{{ title }}</p>
    <UserForm
      :user="user"
      :errors="errors"
      :buttonLabel="buttonLabel"
      :onSubmit="handleSubmit"
    />
    <div v-if="successMessage" class="alert alert-success my-2">
      {{ successMessage }}
    </div>
  </div>
</template>

<script setup>
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";
import http from "@/services/http.js";
import UserForm from "@/components/FormUser.vue";

let successMessage = ref("");
let user = reactive({});
let errors = reactive({ er: {} });
const router = useRouter();

const title = ref("Cadastro de usuário");
const buttonLabel = ref("Cadastrar");

const handleSubmit = async () => {
  try {
    const { data } = await http.post("/users", user);
    successMessage.value = "Usuário criado com sucesso!";
    setTimeout(() => {
      router.push("/user/list");
    }, 1000);
  } catch (error) {
    errors.er = error.response.data.errors;
  }
};
</script>

<style scoped></style>
