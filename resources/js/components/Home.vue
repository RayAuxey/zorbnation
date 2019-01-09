<template>
  <div class="ss">
    <div class="hero parallax">
      <div class="hero-content">
        <h1 class="animated slideInDown"> Zorb Nation</h1>
        <p>Where fun is redifined</p>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="jumbotron">
          <h1 class="display-4">What is Zorbing?</h1>
          <p class="lead">Here's a short introduction.</p>
          <hr class="my-4">
          <p>{{zorbingdesc}}</p>
          <hr class="my-4">
        </div>
      </div>
    </div>
    <div class="mid parallax"></div>
    <div class="section">
      <div class="container">
        <div class="jumbotron">
          <h1 class="display-4">History</h1>
          <p class="lead">Where it all began.</p>
          <hr class="my-4">
          <p>{{history}}</p>
          <a class="btn btn-primary btn-lg" href="https://en.wikipedia.org/wiki/Zorbing" role="button">Learn more</a>
        </div>
      </div>
    </div>
    <div class="end parallax"></div>
    <div class="section">
      <div class="container">
        <div class="jumbotron">
          <h1 class="display-4">More on Zorbing</h1>
          <hr class="my-4">
          <p>{{extra}}</p>
        </div>
      </div>
    </div>
    <div class="outro parallax">
      <div class="outro-content text-light">
        <div class="jumbotron bg-dark">
          <h2>Social media</h2>
          <div class="socials">
            <p><i class="fa fa-twitter fa-lg"></i> @zorbnation</p>
          </div>
          <div class="socials">
            <p><i class="fa fa-facebook fa-lg"></i> /zorbnation</p>
          </div>
          <div class="socials">
            <p><i class="fa fa-instagram fa-lg"></i> @zorbnation</p>
          </div>
        </div>
        <div class="jumbotron bg-dark">
          <h2>Contacts</h2>
          <div class="socials">
            <p><i class="fa fa-envelope-open fa-lg"></i> : info@zorbnation.com</p>
          </div>
          <div class="socials">
            <p><i class="fa fa-globe fa-lg"></i>  www.zorbnation.com</p>
          </div>
          <div class="socials">
            <p><i class="fa fa-phone fa-lg"></i>  0723400500</p>
          </div>
        </div>
        <div class="jumbotron bg-dark">
          <h2>Offices</h2>
          <div class="socials">
            <p>Nairobi: Lighthouse, Westlands</p>
          </div>
          <div class="socials">
            <p>Mombasa: Zuri, CBD</p>
          </div>
          <div class="socials">
            <p>Eldoret: Oldhouse, Jali rd.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import txt from "./textdata";
export default {
  data() {
    return {
      zorbingdesc: txt.zorbingdesc,
      history: txt.history,
      extra: txt.extra
    };
  },
  created() {
    // console.log(this.$store.state.token);
    // console.log(this.$router.currentRoute.fullPath);
  }
};
</script>

<style>
.ss {
  width: 100%;
}
.hero {
  background-image: url("http://localhost:8081/larticles/public/storage/images/zorb.jpg");
  background-size: 100%;
  top: -20px !important;

  /* border: 10px solid black; */
}
.outro {
  background-image: url("http://localhost:8081/larticles/public/storage/images/zorb.jpg");
  background-size: 100%;
  top: -20px !important;

  /* border: 10px solid black; */
}
.mid {
  background-image: url("http://localhost:8081/larticles/public/storage/images/zorb2.jpg");
  background-size: 100%;
  height: 50vh !important;
}
.end {
  background-image: url("http://localhost:8081/larticles/public/storage/images/zorb3.jpg");
}
.parallax {
  height: calc(100vh - 62px);
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-clip: border-box;
  background-size: 100%;
}

.jumbotron {
  margin-top: 10px;
}

.hero-content {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  flex-direction: column;
  background: rgba(0, 0, 0, 0.3);
  color: white;
}

.outro-content {
  padding: 30px;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  align-content: center;
  background: rgba(0, 0, 0, 0.3);
}
.hero-content h1 {
  border: 5px solid white;
  color: white;
  padding: 7px;
  text-transform: uppercase;
}
</style>
