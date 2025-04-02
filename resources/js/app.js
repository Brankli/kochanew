import './bootstrap';
import App from "./app.vue"
import { createApp } from 'vue';
import router from './router';
import i18n from './langs/i18n';


const app = createApp(App);
app.use(i18n);
app.use(router);
app.mount('#app');