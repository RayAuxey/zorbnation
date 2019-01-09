<template>
  <div class="app bg-dark">
    <navbar></navbar>
    <div class="ccc">
      <!-- <div class="sidebar"></div> -->
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
// import Events from "./Events";
import Navbar from "./Navbar";
// import AddEvent from "./AddEvent";
// import ViewEvent from "./ViewEvent";
// import Home from "./Home";
// import SignUp from "./SignUp";
// import SignIn from ".//SignIn";

export default {
  components: {
    navbar: Navbar
    //   events: Events,
    //   addevent: AddEvent,
    //   viewevent: ViewEvent,
    //   home: Home,
    //   signup: SignUp,
    //   signin: SignIn
  }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
};
</script>

<style>
.ccc {
  margin-top: 62px;
  display: flex;
}
.sidebar {
  width: 30vw;
  height: 100vh;
  background: red;
}
.jumbotron {
  box-shadow: 2px 5px 15px black, -2px 5px 15px black;
}
.btn {
  /* border-radius: 20px; */
  text-transform: uppercase;
  box-shadow: 2px 5px 15px grey, -2px 5px 15px grey;
}
.active {
  border-bottom: 3px solid white;
}
</style>
