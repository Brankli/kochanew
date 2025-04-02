import { createRouter, createWebHashHistory } from "vue-router";
import mainPage from "./front/index.vue"
import contact  from "./front/contact/index.vue"
import resource from "./front/resource/index.vue"
import Aboutekocha from "./front/aboutKocha/index.vue"
import aboutdeps from "./front/departments/departmenthead/index.vue"
import expansion from "./front/departments/expansion/index.vue"
import development from "./front/departments/development/index.vue";
import minirals from "./front/departments/minirals/index.vue";
import news from "./front/news/index.vue"
import newsDetail from "./front/news/newsDetail/index.vue" 
import eventDetail from "./front/news/eventDetail/index";
import ourwork from "./front/ourwork/index.vue" 
import resetpassword from "./login/reset.vue";

const routes = [
    {
        path: "/",
        name: "mainPage",
        component: mainPage,
    },
    {
        path: "/contact",
        name: "contact",
        component: contact,
    },
    {
        path: "/resource",
        name: "resource",
        component: resource,
    },
    {
        path: "/Aboutekocha",
        name: "Aboutekocha",
        component: Aboutekocha,
    },
    {
        path: "/aboutdeps",
        name: "aboutdeps",
        component: aboutdeps,
    },
    {
        path: "/news",
        name: "news",
        component: news,
    },
    {
        path: "/newsDetail/:id",
        name: "newsDetail",
        component: newsDetail,
    },
    {
        path: "/eventDetail/:id",
        name: "eventDetail",
        component: eventDetail,
    },
    {
        path: "/expansion",
        name: "expansion",
        component: expansion,
    },
    {
        path: "/development",
        name: "development",
        component: development,
    },
    {
        path: "/minirals",
        name: "minirals",
        component: minirals,
    },
    {
        path: "/ourwork",
        name: "ourwork",
        component: ourwork,
    },
    {
        path: "/resetpassword/:id",
        name: "resetpassword",
        component: resetpassword,
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
