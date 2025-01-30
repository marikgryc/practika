import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import CatalogView from '../views/CatalogView.vue';

const routes = [
  { path: '/', component: HomeView },
  { path: '/catalog', component: CatalogView }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
