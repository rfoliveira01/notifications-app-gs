// Composables
import { createRouter, createWebHistory } from 'vue-router'
import Home from '../Home.vue'
import MessagesHome from '../Messages/MessagesHome.vue'
const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/messages', name: 'Messages', component: MessagesHome },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
