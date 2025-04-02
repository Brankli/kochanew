import "../bootstrap";
import { createApp } from "vue";
import App from "./back.vue";
import router from "./router";
import QuillEditor from "../../js/back/QuillEditor.vue"

const app = createApp(App);
app.use(router);
app.component("QuillEditor", QuillEditor);
app.mount("#app");
