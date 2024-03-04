import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import("../views/AboutView.vue"),
    },
    {
      path: "/user/create",
      name: "user-create",

      component: () => import("../views/UserCreateView.vue"),
    },
    {
      path: "/user/list",
      name: "user-list",

      component: () => import("../views/UserListView.vue"),
    },
    {
      path: "/user/update/:id",
      name: "user-update",

      component: () => import("../views/UserUpdateView.vue"),
    },

    {
      path: "/products",
      name: "products",

      component: () => import("../views/ProductsView.vue"),
    },
  ],
});

export default router;
