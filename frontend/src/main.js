// import './assets/main.css'
import FormInputError from "@/components/FormInputError.vue";
import ProductsInfo from "@/components/ProductsInfo.vue";

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

const app = createApp(App);
app.component("FormInputError", FormInputError);
app.component("ProductsInfo", ProductsInfo);
app.use(router);

app.mount("#app");
