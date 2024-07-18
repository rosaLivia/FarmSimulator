import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/Views/HomeView.vue';
import LoginView from '@/Views/LoginView.vue'


const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginView
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
