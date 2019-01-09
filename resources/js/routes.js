import Vue from "vue";
import VueRouter from "vue-router";

import Events from "./components/Events";
import AddEvents from "./components/AddEvent";
import ViewEvent from "./components/ViewEvent";
import Home from "./components/Home";
import SignUp from "./components/SignUp";
import SignIn from "./components/SignIn";
import About from "./components/About";
import UpdateEvent from "./components/UpdateEvent";
import Gallery from "./components/Gallery";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: "/events",
            component: Events
        },
        {
            path: "/addevent",
            component: AddEvents
        },
        {
            path: "/event/:id",
            component: ViewEvent
        },
        {
            path: "/",
            component: Home
        },
        {
            path: "/signup",
            component: SignUp
        },
        {
            path: "/signin",
            component: SignIn
        },
        {
            path: "/about",
            component: About
        },
        {
            path: "/update/:id",
            component: UpdateEvent
        },
        {
            path: "/gallery",
            component: Gallery
        }
    ]
});

export default router;
