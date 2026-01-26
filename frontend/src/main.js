import './assets/main.css'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router';

const app = createApp(App);
app.use(router);
app.component('FontAwesomeIcon', FontAwesomeIcon);
app.mount('#app');
