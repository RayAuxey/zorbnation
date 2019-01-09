<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="jumbotron">
          <h1 class="display-4">Sign In!</h1>
          <hr class="my-4">
          <form>
            <div class="form-group">
              <label for="eventLocation">Enter Email</label>
              <input
                v-model="user.email"
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter Email"
              >
            </div>
            <div class="form-group">
              <label class for="date">Enter Password</label>
              <input v-model="user.password" type="password" class="form-control" id="password">
            </div>
            <button type="submit" @click.prevent="signUser" class="btn btn-dark">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: ""
      }
    };
  },
  methods: {
    signUser() {
      fetch("api/user/signin", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify(this.user)
      })
        .then(res => res.json())
        .then(res => {
          // console.log(res);
          const token = res.token;
          const user = res.user;
          const name = res.name;

          this.$store.state.token = token;
          this.$store.state.name = name;
          this.$store.state.user = user;
          localStorage.setItem("token", token);
          localStorage.setItem("user", user);
          localStorage.setItem("name", name);
          this.$router.push("/events");
          alert("You have succesfully Signed in");

          // console.log(localStorage.getItem("token"));
        });
    }
  }
};
</script>

<style>
.container {
  margin-top: 15px;
}
</style>
