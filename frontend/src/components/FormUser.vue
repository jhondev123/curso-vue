<template>
  <form @submit.prevent="handleSubmit">
    <input
      type="text"
      name="firstname"
      id="firstname"
      class="form-control my-4"
      placeholder="First Name"
      v-model="user.firstname"
    />
    <template v-if="errors.er.firstname">
      <FormInputError v-for="erro in errors.er.firstname" :message="erro" />
    </template>

    <input
      type="text"
      name="lastname"
      id="lastname"
      class="form-control my-4"
      placeholder="Last Name"
      v-model="user.lastname"
    />

    <template v-if="errors.er.lastname">
      <FormInputError v-for="erro in errors.er.lastname" :message="erro" />
    </template>

    <input
      type="text"
      name="email"
      id="email"
      class="form-control my-4"
      placeholder="E-mail"
      v-model="user.email"
    />
    <template v-if="errors.er.email">
      <FormInputError v-for="erro in errors.er.email" :message="erro" />
    </template>

    <input
      type="text"
      name="password"
      id="password"
      class="form-control my-4"
      placeholder="Password"
      v-model="user.password"
    />
    <template v-if="errors.er.password">
      <FormInputError v-for="erro in errors.er.password" :message="erro" />
    </template>

    <button class="btn btn-success mx-2">{{ buttonLabel }}</button>
    <router-link to="/user/list" class="btn btn-danger">Cancelar</router-link>
  </form>
</template>

<script setup>
import { ref, reactive } from "vue";

const props = defineProps({
  user: Object,
  errors: Object,
  buttonLabel: String,
  onSubmit: Function,
});

const handleSubmit = () => {
  props.onSubmit();
};
</script>
