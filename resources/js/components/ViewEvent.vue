<template>
  <div class="container jumbotron">
    <router-link to="/events">
      <button class="btn btn-dark">
        <i class="fa fa-chevron-left"></i> Back
      </button>
    </router-link>
    <button
      v-if="event.user == this.$store.state.user"
      @click="deleteEvent"
      class="ml-3 btn btn-danger"
    >
      <i class="fa fa-trash"></i> Delete
    </button>
    <router-link v-if="event.user == this.$store.state.user" :to="'/update/'+id">
      <button class="ml-3 btn btn-warning">
        <i class="fa fa-edit"></i> Update
      </button>
    </router-link>
    <div class="header">
      <h1>{{event.name}}</h1>
      <h3>Location: {{event.location}}</h3>
      <h3>Date: {{event.date}}</h3>
      <h3>Attending: {{event.attends}}</h3>
    </div>
    <hr>
    <div class="content">
      <img class="event-image" :src="'storage/images/'+event.image" alt>
      <hr>
      <p>{{event.description}}</p>
      <button v-if="this.$store.state.token" class="btn btn-dark" @click="attend">
        <i class="fa fa-plus"></i> Attend
      </button>
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
  mounted() {
    fetch(`api/event/${this.id}`)
      .then(res => res.json())
      .then(res => (this.event = res.data));
  },
  methods: {
    deleteEvent() {
      const yes = confirm("Are sure you want to delete this event");
      if (yes) {
        fetch(`api/event/${this.id}?token=${this.$store.state.token}`, {
          method: "delete"
        })
          .then(res => res.json())
          .then(res => (this.event = res.data));
        this.$router.push("/events");
      }
    },
    attend() {
      const yes = confirm("Attend this event?");
      if (yes) {
        fetch(`api/event/attend?token=${localStorage.getItem("token")}`, {
          method: "post",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            event_id: this.event.id
          })
        })
          .then(res => res.json())
          .then(res => {
            alert("You will attend this event");
            this.$router.push("/events");
          });
      }
    }
  }
};
</script>

<style>
.event-image {
  max-width: 100%;
  height: auto;
  border-radius: 6px;
  box-shadow: 1px 2px 7px black, -1px 2px 7px black;
}
.header {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
.header > * {
  margin-right: 20px;
}
.content {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>
