import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../components/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  // {
  //   path: '/:userId',
  //   name: 'home_user',
  //   component: HomeView,
  //   props: true
  // },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../components/AboutView.vue')
  },
  {
    path: '/login_register/:type',
    name: 'login_register',
    component: () => import('../components/LoginRegisterView.vue')
  },
  {
    path: '/daftar_kos',
    name: 'daftar_kos',
    component: () => import('../components/DaftarKosView.vue')
  },
  {
    path: '/booking/:id',
    name: 'booking_form',
    component: () => import('../components/BookingFormView.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
