import "./assets/main.css";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import { createI18n } from "vue-i18n";
import EN from "./locale/en.json";
import AR from "./locale/ar.json";

const params = new URLSearchParams(window.location.search);
const lang = params.get("lang") || "ar";

const i18n = createI18n({
    locale: lang,
    messages: {
        ar: AR,
        en: EN,
    }
});

const app = createApp(App);
app.use(router);
app.component("FontAwesomeIcon", FontAwesomeIcon);
app.use(i18n);
app.mount("#app");
