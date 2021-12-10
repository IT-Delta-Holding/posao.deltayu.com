require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue';

Vue.component('front-page', require('./components/Front.vue').default);
Vue.component('agrar-page', require('./components/SelectedLegalEntityDA.vue').default);
Vue.component('dts-page', require('./components/SelectedLegalEntityDTS.vue').default);

const app = new Vue({
    el: '#app',
});
