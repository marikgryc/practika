import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../components/HomeView.vue';
import CatalogView from '../components/CatalogView.vue';

const routes = [
  { path: '/', component: HomeView },
  { path: '/catalog', component: CatalogView }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
