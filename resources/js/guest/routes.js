import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../components/pages/Home.vue';
import Contacts from '../components/pages/Contacts.vue';
import PostContainer from '../components/pages/PostContainer.vue'
import PostDetail from '../components/pages/PostDetail.vue'
import Error404 from '../components/pages/Error404.vue'

const router = new VueRouter({
  mode: 'history', //relazione con cronologia del browser
  linkExactActiveClass: 'active', //imposto classe active custom dei link
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/contatti',
      name: 'contacts',
      component: Contacts
    },
    {
      path: '/blog',
      name: 'blog',
      component: PostContainer
    },
    {
      path: '/detail/:slug',
      name: 'detail',
      component: PostDetail
    },
    {
      path: '*',
      component: Error404
    },
  ]
});

export default router;