import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '../components/cip-constancia.vue'
import hola from '../components/hola.vue'



Vue.use(Router)

export default new Router({
  mode:"history",
  routes: [
    {
      path: '/cip',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/hola',
      name: 'hola',
      component: hola
    }
  ]
})
