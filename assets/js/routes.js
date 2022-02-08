import Vue from 'vue'
import VueRouter from 'vue-router'
import Inicio from './components/Inicio'
import Form from './components/Form'
Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes:
        [
            {
                path: '/',
                name: 'Inicio',
                component: Inicio
            },
            {
                path: '/form/',
                name: 'Form',
                component: Form
            },
            {
                path: '/form/editar/:id',
                name: 'Edit',
                component: Form
            }
        ]
})

export default router
