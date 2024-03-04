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
import { useRoute } from "vue-router";
const route = useRoute();

let successMessage = ref("");
let user = reactive({});
let errors = reactive({ er: {} });
const router = useRouter();

const title = ref("Atualização de usuário");
const buttonLabel = ref("Atualizar");

const handleSubmit = async () => {
  try {
    const { data } = await http.put(`/users/${route.params.id}`, user);
    successMessage.value = "Usuário atualizado com sucesso!";
    setTimeout(() => {
      router.push("/user/list");
    }, 1000);
  } catch (error) {
    errors.er = error.response.data.errors;
  }
};

onMounted(async () => {
  await pesquisaUser();
});

async function pesquisaUser() {
  try {
    const response = await http.get(`users/${route.params.id}`);

    user.firstname = response.data.firstname;
    user.lastname = response.data.lastname;
    user.email = response.data.email;
    user.password = response.data.password;
  } catch (error) {
    console.error("Erro ao buscar os usuários:", error);
  }
}
</script>

<style scoped></style>
