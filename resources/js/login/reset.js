import {createApp} from 'vue';
import reset from "./reset.vue";
import router from '../router';

const app = createApp(reset);
app.use(router);
app.mount('#app');