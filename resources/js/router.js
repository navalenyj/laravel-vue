import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);
import Index from "./views/Index";
import addPost from "./views/AddPost";
import OnePost from "./views/OnePost";


const routes = [
    {
        path: "/",
        component: Index

    },
    {
        path: '/addPost',
        component: addPost
    },
    {
        path: '/post/:id',
        component: OnePost
    },
];

export default new vueRouter({
    mode: "history",
    routes
});
