require('./bootstrap');

Vue.component('app-component', require('./components/App.vue'))

new Vue({
  el: '#app'
})
