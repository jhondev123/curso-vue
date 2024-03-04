<script setup>
import { onMounted, reactive, ref, watch } from "vue";
import http from "@/services/http.js";

let users = reactive({ users: {} });
let pesquisa = ref("");

onMounted(async () => {
  await pesquisaUser();
});

watch(pesquisa, async () => {
  await pesquisaUser();
});

async function pesquisaUser() {
  try {
    const response = await http.get("users", {
      params: {
        pesquisa: pesquisa.value,
      },
    });

    users.users = response.data;
  } catch (error) {
    console.error("Erro ao buscar os usuários:", error);
  }
}
</script>

<template>
  <div class="px-3 py-3 d-flex justify-content-end">
    <input
      type="text"
      name="pesquisaUser"
      id="pesquisaUser"
      placeholder="Pesquisa Usuário"
      v-model="pesquisa"
    />
  </div>
  <ul>
    <template v-if="users.users.length">
      <li v-for="user in users.users" :key="user.id" class="card py-2 my-2">
        <p>Nome: {{ user.firstname }}</p>
        <p>Sobrenome: {{ user.lastname }}</p>
        <p>Criado em: {{ user.created_at }}</p>
        <p>Atualizado em: {{ user.updated_at }}</p>

        <router-link :to="'/user/update/' + user.id">Editar</router-link>

        <a>Excluir</a>
      </li>
    </template>
    <template v-else>
      <li class="card py-2 my-2">Nenhum usuário encontrado.</li>
    </template>
  </ul>
</template>
