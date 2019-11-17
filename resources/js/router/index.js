import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import WeeklyCardComponent from '../components/parts/WeeklyCardComponent.vue'

const routes = [
    {
      path: '/',
      component: WeeklyCardComponent,
    },
    {
      path: '/test',
      component: WeeklyCardComponent,
    },
]

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

export default router

  