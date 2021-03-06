/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('categories-menu', require('./components/menu-categories-menu.vue'));
Vue.component('player', require('./components/player/player.vue'));
Vue.component('umas-player', require('./components/player/player-umas.vue'));
Vue.component('single-track-player', require('./components/player/single-track-player.vue'));
Vue.component('track-admin-actions', require('./components/track/track-admin-actions.vue'));
const app = new Vue({
    el: '#base'
});