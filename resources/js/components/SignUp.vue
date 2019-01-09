<template>
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="jumbotron">
            <h1 class="display-4">Sign Up!</h1>
            <hr class="my-4">
            <form>
              <div class="form-group">
                <label for="eventName">Name</label>
                <input v-model="user.name" type="text" class="form-control" id="name" placeholder="Enter name">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
              </div>
              <div class="form-group">
                <label for="eventLocation">Enter Email</label>
                <input v-model="user.email" type="email" class="form-control" id="email" placeholder="Enter Email">
              </div>
              <div class="form-group ">
                <label class="" for="date">Enter Password</label>
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
      fetch("api/user", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify(this.user)
      })
        .then(res => res.json())
        .then(res => {
          alert("You have succesfully signed up!");
          this.$router.push("/signin");
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
