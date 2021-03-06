/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

import Router from "./routes";
import store from "./store";

window.Vue = require("vue");

// Vue.component("events", require("./components/Events.vue"));

// Vue.component("navbar", require("./components/Navbar.vue"));
Vue.component("app", require("./components/App.vue"));

const app = new Vue({
    el: "#app",
    router: Router,
    store: store
});
