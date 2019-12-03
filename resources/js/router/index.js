import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from    '../App.vue'
import Weekly from '../components/pages/WeeklyCardComponent.vue'
import Request from '../components/pages/RequestPageComponent.vue'
import NotFound from '../components/pages/NotFoundComponent.vue' // Not Found(404)画面


const routes = [
    {
        path: '*', 
        component: NotFound
    },
    {
        path: '/',
        component: App,
    },
    {
        path: '/request',
        name: 'request',
        component: Request
    },
    {
        path: '/:path',
        name: 'week',
        component: Weekly
    },
]

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router