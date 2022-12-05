import {
    createRouter,
    createWebHashHistory
} from 'vue-router';


const routes = [{
        path: '/',
        component: () => import(/* webpackChunkName: "AboutPage" */ '@/modules/tienda/pages/ListadoTiendas.vue')
    },
    {
        path: '/sobre-nosotros',
        component: () => import(/* webpackChunkName: "TiendaPage" */ '@/modules/shared/pages/SobreNosotros.vue')
    },
    {
        path: '/mis-ordenes',
        component: () => import(/* webpackChunkName: "TiendaPage" */ '@/modules/shared/pages/MisOrdenes.vue')
    },
    {
        path: '/tienda/:id',
        name: 'tiendaDetalle',
        component: () => import(/* webpackChunkName: "TiendaPage" */ '@/modules/tienda/pages/TiendaDetalle.vue'),
        
        props: (route) => {

            const { id } = route.params

            return { id : Number(id) }
        }
    },
    {
        path: '/:pathMatch(.*)*',
        component: import(/* webpackChunkName: "TiendaPage" */ '@/modules/shared/pages/NoPageFound.vue')
    },

]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})


export default router