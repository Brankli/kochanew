import { createRouter, createWebHashHistory } from "vue-router";
import { useLocalStorage } from "@vueuse/core";
import dashbord from "./index.vue"
import post from "./pages/news/create.vue";
import edit from "./pages/news/edit.vue";
import editevent from "./pages/events/edit.vue";
import newspage from "./pages/news/news.vue";
import content from "./pages/content/webcontent/index.vue"
import editweb from "./pages/content/webcontent/edit.vue";
import editdepartment from "./pages/content/departmentconntent/edit.vue";
import ourwork from "./pages/ourworks/index.vue"
import postwork from "./pages/ourworks/create.vue";
import editwork from "./pages/ourworks/edit.vue";
import services from "./pages/service/index.vue";
import editservice from "./pages/service/edit.vue";
import answer from "./pages/question/answer.vue"

import createResource from "./pages/channels/create.vue";
import channels from "./pages/channels/index.vue";
import brodcast from "./pages/channels/brodcaster/brodcast.vue"


import eventannauncer from "./pages/events/create.vue";
import profile from "./pages/profiles/index.vue";

import userprofile from "./pages/profiles/profiles.vue";

import comingsoon from "../errors/comingsoon.vue";
import sponsers from  "./pages/sponsers/index.vue";
import newsponsers from "./pages/sponsers/create.vue";
import testimonial from "./pages/testimonies/create.vue";
import newtestimonial from "./pages/testimonies/index.vue";
import banner from "./pages/Banner/create.vue";
import newbanner from "./pages/Banner/index.vue";





const token = useLocalStorage('token', '');

const routes = [
    {
        path: "/",
        name: "dashbord",
        component: dashbord,
    },
    {
        path: "/post",
        name: "post",
        component: post,
    },
    {
        path: "/edit/:id",
        name: "edit",
        component: edit,
    },
    {
        path: "/editevent/:id",
        name: "editevent",
        component: editevent,
    },
    {
        path: "/newspage",
        name: "newspage",
        component: newspage,
    },
    {
        path: "/content",
        name: "content",
        component: content,
    },
    {
        path: "/ourwork",
        name: "ourwork",
        component: ourwork,
    },
    {
        path: "/postwork",
        name: "postwork",
        component: postwork,
    },
    {
        path: "/editwork/:id",
        name: "editwork",
        component: editwork,
    },
    {
        path: "/editweb/:id",
        name: "editweb",
        component: editweb,
    },
    {
        path: "/editdepartment/:id",
        name: "editdepartment",
        component: editdepartment,
    },
    {
        path: "/services",
        name: "services",
        component: services,
    },
    {
        path: "/editservice/:id",
        name: "editservice",
        component: editservice,
    },
    {
        path: "/answer/:id",
        name: "answer",
        component: answer,
    },
    {
        path: "/channels",
        name: "channels",
        component: channels,
    },
    {
        path: "/createResource",
        name: "createResource",
        component: createResource,
    },
    {
        path: "/brodcast",
        name: "brodcast",
        component: brodcast,
    },
    {
        path: "/eventannauncer",
        name: "eventannauncer",
        component: eventannauncer,
    },
    {
        path: "/profile",
        name: "profile",
        component: profile,
    },
    {
        path: "/userprofile",
        name: "userprofile",
        component: userprofile,
    },
    {
        path: "/comingsoon",
        name: "comingsoon",
        component: comingsoon,
    },
    {
        path: "/sponsers",
        name: "sponsers",
        component: sponsers,
    },
    {
        path: "/testimonial",
        name: "testimonial",
        component: testimonial,
    },

    {
        path: "/newtestimonial",
        name: "newtestimonial",
        component: newtestimonial,
    },
    {
        path: "/banner",
        name: "banner",
        component: banner,

    },
    {
        path: "/newbanner",
        name: "newbanner",
        component: newbanner,
    },
    {
        path: "/newsponsers",
        name: "newsponsers",
        component: newsponsers,
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some((record) => record.meta.requiresAuth);


    if (token.value == '') {
        window.location.href = "http://127.0.0.1:8000/login";
    } else {
        next();
    }
});

export default router;
