import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from    '../App.vue'
import Weekly from '../components/pages/WeeklyCardComponent.vue'
import Message from '../components/pages/MessagePageComponent.vue'
import NotFound from '../components/pages/NotFoundComponent.vue' // Not Found(404)画面


const routes = [
    {
        path: '*',
        component: NotFound
    },
    {
        path: '/404', 
        component: NotFound
    },
    {
        path: '/',
        component: App,
    },
    {
        path: '/message',
        name: 'message',
        component: Message
    },
    {
        path: '/:path',
        name: 'week',
        component: Weekly,
        beforeEnter: (to, from, next) => {
            const weekArray = ['mon','tue','wed','thu','fri','sat','sun']
            const week      = to.params.path
            if (weekArray.indexOf(week) >= 0) {
                next()
            } else {
                next('/404')
            }
        }
    },
]

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router