<template>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <router-link to="/">
      <span class="navbar-brand">Zorb Nation</span>
    </router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="ml-auto navbar-nav mr-4">
        <li
          class="nav-item"
          @click="clicked"
          v-for="navlink in navlinks"
          :key="navlink.name"
          :class="{active : currentLink === navlink.link}"
        >
          <router-link class="nav-link" v-bind:name="navlink.name" v-bind:to="navlink.link">
            <i :class="`fa fa-${navlink.icon}`"></i>
            {{navlink.name}}
          </router-link>
        </li>
        <li
          class="ml-5 nav-item"
          :class="{active : currentLink === '/signup'}"
          v-if="!this.$store.state.token"
        >
          <router-link class="nav-link" to="/signup">
            <i class="fa fa-user-plus"></i> Sign Up
          </router-link>
        </li>
        <li
          class="nav-item"
          :class="{active : currentLink === '/signin'}"
          v-if="!this.$store.state.token"
        >
          <router-link class="nav-link" to="/signin">
            <i class="fa fa-user"></i> Sign In
          </router-link>
        </li>

        <li class="ml-5 nav-item" v-if="this.$store.state.token" @click="logout">
          <span class="nav-link">
            <i class="fa fa-power-off"></i>
            Log out - {{this.$store.state.name}}
          </span>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      navlinks: [
        { name: "Home", link: "/", icon: "home" },
        { name: "Events", link: "/events", icon: "calendar" },
        { name: "Gallery", link: "/gallery", icon: "photo" },
        { name: "About", link: "/about", icon: "info" }
      ],
      currentLink: null
    };
  },
  methods: {
    clicked(e) {
      for (let link of this.navlinks) {
        if (link.name !== e.target.name) link.active = false;
        else link.active = true;
      }
    },
    logout() {
      const yes = confirm("Are you sure you want to logout?");
      if (yes) {
        localStorage.clear();
        this.$store.state.token = null;
        this.$store.state.user = null;
        this.$router.push("/");
      }
    }
    // changeLink() {
    //   this.currentLink = this.$router.currentRoute.fullPath;
    //   // console.log(this.currentLink);
    // }
  },
  created() {
    this.currentLink = this.$router.currentRoute.fullPath;
  },
  watch: {
    $route(to, from) {
      this.currentLink = this.$router.currentRoute.fullPath;
    }
  }
};
</script>

<style>
.navbar-brand {
  text-transform: uppercase;
  padding: 5px;
  border: 3px solid white;
}
.navbar {
  box-shadow: 0px 2px 10px black;
}
.nav-link {
  cursor: pointer;
}
</style>
