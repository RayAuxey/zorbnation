<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="jumbotron">
          <router-link to="/events">
            <button class="btn btn-dark">
              <i class="fa fa-chevron-left"></i> Back
            </button>
          </router-link>
          <h1 class="display-4">Update an Event</h1>
          <hr class="my-4">
          <form>
            <div class="form-group">
              <label for="eventName">Event Name</label>
              <input
                v-model="event.name"
                type="text"
                class="form-control"
                id="eventName"
                placeholder="Enter event name"
              >
              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
              <label for="eventLocation">Enter Event Location</label>
              <input
                v-model="event.location"
                type="text"
                class="form-control"
                id="eventLocation"
                placeholder="Event Locaton"
              >
            </div>
            <div class="form-group">
              <label class for="date">Enter Date</label>
              <input v-model="event.date" type="date" class="form-control" id="date">
            </div>
            <div class="form-group">
              <label for="eventDescription">Enter Event Description</label>
              <textarea
                v-model="event.description"
                type="textarea"
                class="form-control"
                id="eventDescription"
                placeholder="Event Description"
              ></textarea>
            </div>
            <div class="form-group">
              <label class for="file">Enter Image</label>
              <input type="file" @change="imageChanged" class="form-control" id="file">
            </div>
            <button type="submit" v-on:click="submitEvent" class="btn btn-dark">Submit</button>
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
      id: this.$route.params.id,
      event: {}
    };
  },
  methods: {
    submitEvent(e) {
      this.event.event_id = this.id;
      console.log(this.id);
      fetch(`api/event?token=${this.$store.state.token}`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(this.event)
      })
        .then(res => res.json())
        .then(res => this.$router.push(`/event/${this.id}`));
      e.preventDefault();
    },
    imageChanged(e) {
      // console.log(e.target.files[0]);
      let fileReader = new FileReader();

      fileReader.readAsDataURL(e.target.files[0]);

      fileReader.onload = e => {
        this.event.image = e.target.result;
      };
      console.log(this.event.image);
    }
  },
  mounted() {
    fetch(`api/event/${this.id}`)
      .then(res => res.json())
      .then(res => (this.event = res.data));
  }
};
</script>

<style scoped>
</style>

