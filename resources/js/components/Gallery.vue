<template>
  <div class="container jumbotron">
    <h1>Fun Videos on Zorbing</h1>
    <div v-for="video in videos" :key="video.src" class="video-panel jumbotron bg-dark text-light">
      <video
        class="video"
        :src="`http://localhost:8081/larticles/public/storage/videos/${video.src}`"
        controls
      ></video>
      <div class="video-title">
        <h3>{{video.title}}</h3>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      videos: [
        { title: "Ultimate Zorbing Experience!", src: "zorb1.mp4" },
        {
          title: "OGO at Outdoor Gravity Park Pigeon Forge - Zorbing",
          src: "zorb2.mp4"
        },
        {
          title: "ZORB Rotorua, New Zealand - Living a Kiwi Life",
          src: "zorb3.mp4"
        },
        {
          title: "OGO Zorbing in New Zealand",
          src: "zorb4.mp4"
        },
        {
          title: "Life In A Bubble! ",
          src: "zorb5.mp4"
        },
        {
          title: "ZORB FOOTBALL",
          src: "zorb6.mp4"
        }
      ]
    };
  }
};
</script>

<style scoped>
.container {
  margin-top: 15px;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.video-panel {
  margin: 30px;
  width: 100%;
  max-width: 800px;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.video-title {
  margin-top: 20px;
}
.video {
  width: 100%;
}
h1 {
  font-weight: 900;
}
</style>
