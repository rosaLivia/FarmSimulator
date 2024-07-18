import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/Views/HomeView.vue';
import LoginComponent from '@/components/LoginComponent.vue'


const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginComponent
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
