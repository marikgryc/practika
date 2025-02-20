import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../components/HomeView.vue';
import CatalogView from '../components/CatalogView.vue';
import AuthAcc from '../components/AuthAcc.vue'; 
import AboutUs from '../components/AboutUs.vue';
import ContactsView from '../components/ContactsView.vue';
import CartView from '../components/CartView.vue';
import CheckoutView from '../components/CheckoutView.vue'
import AccOunt from '@/components/AccOunt.vue';
import ReviewsView from '@/components/ReviewsView.vue';
import AdMin from '@/components/AdMin.vue';
import AddProduct from '@/components/AddProduct.vue';

const routes = [
  { path: '/', component: HomeView },
  { path: '/catalog', component: CatalogView },
  { path: '/cart', component: CartView },
  { path: '/auth', component: AuthAcc },
  { path: '/about', component: AboutUs },
  { path: '/contacts', component: ContactsView },
  { path: '/checkout', component: CheckoutView },
  { path: '/account', component: AccOunt},
  { path: '/reviews', component: ReviewsView},
  { 
    path: '/admin', 
    component: AdMin, 
    beforeEnter: (to, from, next) => {
      const user = JSON.parse(localStorage.getItem("user_data"));
      if (user && user.role === "admin") {
        next();
      } else {
        alert("Доступ заборонено!");
        next("/");
      }
    }
  },
  { path: '/add-product', component: AddProduct }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;