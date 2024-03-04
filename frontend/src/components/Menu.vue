<script setup></script>

<template>
  <nav class="navbar navbar-expand-lg bg-blue">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">header</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/" class="nav-link active">home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/about" class="nav-link active">about</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/user/create" class="nav-link active">
              user-create</router-link
            >
          </li>
          <li class="nav-item">
            <router-link to="/user/list" class="nav-link active">
              user-list</router-link
            >
          </li>
          <li class="nav-item">
            <router-link to="/products" class="nav-link active">
              Products</router-link
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.bg-blue {
  background-color: aqua;
}
</style>
