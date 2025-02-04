/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('test', require('./components/test.vue').default);
Vue.component('app', require('./components/app.vue').default);
Vue.component('card', require('./components/card.vue').default);
Vue.component('navbar', require('./components/navbar.vue').default);
Vue.component('outertest', require('./components/outertest.vue').default);
Vue.component('illnesstypes', require('./components/charts/illnesstypes.vue').default);
Vue.component('poppie', require('./components/charts/poppie.vue').default);
Vue.component('genderbar', require('./components/charts/genderbar.vue').default);
Vue.component('genderpie', require('./components/charts/genderpie.vue').default);
Vue.component('illammount', require('./components/charts/illammount.vue').default);
Vue.component('havediscussedbar', require('./components/charts/havediscussedbar.vue').default);
Vue.component('havediscussedpie', require('./components/charts/havediscussedpie.vue').default);
Vue.component('woulddiscusspie', require('./components/charts/woulddiscusspie.vue').default);
Vue.component('woulddiscussbar', require('./components/charts/woulddiscussbar.vue').default);
Vue.component('providesbar', require('./components/charts/providesbar.vue').default);
Vue.component('knownbar', require('./components/charts/knownbar.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
