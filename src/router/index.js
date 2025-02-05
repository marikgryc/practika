import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../components/HomeView.vue';
import CatalogView from '../components/CatalogView.vue';
import LoginRegisterView from '../components/LoginRegisterView.vue'; 
import AboutUs from '../components/AboutUs.vue';
import ContactsView from '../components/ContactsView.vue';
import AssessmentView from '../components/AssessmentView.vue';
const routes = [
  { path: '/', component: HomeView },
  { path: '/catalog', component: CatalogView },
  { path: '/auth', component: LoginRegisterView },
  { path: '/about', component: AboutUs },
  { path: '/contacts', component: ContactsView },
  { path:  '/assessment', component: AssessmentView}
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;