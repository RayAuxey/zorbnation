<template>
  <div class="container">
    <div class="jumbotron">
      <h1>About Us</h1>
      <p>{{about}}</p>
    </div>
  </div>
</template>

<script>
import textdata from "./textdata";
export default {
  data() {
    return {
      about: textdata.extra
    };
  }
};
</script>

<style>
.container {
  margin-top: 15px;
}
</style>
