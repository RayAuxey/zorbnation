import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user: localStorage.getItem("user")
            ? localStorage.getItem("user")
            : null,
        token: localStorage.getItem("token")
            ? localStorage.getItem("token")
            : null,
        name: localStorage.getItem("name") ? localStorage.getItem("name") : null
    }
});

export default store;
