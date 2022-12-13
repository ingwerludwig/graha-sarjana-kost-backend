import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../components/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
  },
  {
    path: '/about',
    name: 'about',
    component: () => import(/* webpackChunkName: "about" */ '../components/AboutView.vue')
  },
  {
    path: '/payment/:id',
    name: 'payment',
    component: () => import('../components/PaymentView.vue')
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
