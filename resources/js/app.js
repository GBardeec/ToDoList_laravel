import './bootstrap';

import {createApp} from 'vue';
import * as VueRouter from 'vue-router';

import Index from "@/components/Index.vue";

const routes = [
    {path: '/', component: Index},
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory('/'),
    routes
})

const app = (createApp({}));

app.use(router);

app.component('index', Index);

app.mount('#app');
