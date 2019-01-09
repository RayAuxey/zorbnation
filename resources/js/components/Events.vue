<template>
  <div class="container jumbotron">
    <!-- <button >Prev</button><button v-on:click="fetchEvents(next)">Next</button> -->
    <div class="eventnav">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item" v-if="prev" v-on:click="fetchEvents(prev)">
            <a class="page-link" href="#">Previous</a>
          </li>
          <li class="page-item" v-if="next" v-on:click="fetchEvents(next)">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
      <router-link to="/addevent" v-if="this.$store.state.token">
        <button class="ml-auto btn btn-dark">
          <i class="fa fa-plus"></i> Add Event
        </button>
      </router-link>
    </div>
    <div class="events">
      <div
        :class="{owned : user == event.user}"
        class="card animated fadeIn"
        v-for="event in events"
        v-bind:key="event.id"
      >
        <router-link class="no-style" v-bind:to="'/event/'+ event.id">
          <img
            class="card-img-top"
            v-bind:src="'storage/images/' + event.image"
            alt="Card image cap"
          >

          <div class="card-body">
            <div>
              <h5 class="card-title">Event: {{event.name}}</h5>
              <p class="card-text">Location: {{event.location}}</p>
              <p class="card-text">Date: {{event.date}}</p>
              <div class="attend-btns">
                <span :for="event.id" class="attends btn btn-secondary">
                  <i class="fa fa-users fa-lg"></i>
                  <span class="attends-value">{{event.attends}}</span>
                </span>
              </div>
            </div>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </router-link>
      </div>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item" v-if="prev" :class="{disabled: !prev}" v-on:click="fetchEvents(prev)">
          <a class="page-link" href="#">Previous</a>
        </li>
        <li class="page-item" v-if="next" v-on:click="fetchEvents(next)">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {
      events: [],
      prev: null,
      next: null,
      user: localStorage.getItem("user")
    };
  },
  mounted() {
    this.fetchEvents("api/events");
    console.log(this.user);
  },
  methods: {
    fetchEvents(url) {
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.prev = res.links.prev;
          this.next = res.links.next;
          this.events = res.data;
        });
    },
    attend(e) {
      const id = e.target.getAttribute("for");
      console.log(id);
      const yes = confirm("Attend this event?");
      if (yes) {
        fetch(`api/event/attend?token=${localStorage.getItem("token")}`, {
          method: "post",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            event_id: e.target.getAttribute("for")
          })
        })
          .then(res => res.json())
          .then(res => {
            alert("You will attend this event");
            console.log(this.addAttend(e.target.getAttribute("for")));
          });
      }
    },
    addAttend(id) {
      const atts = document.querySelectorAll(".attends");
      for (let att of atts) {
        if (att.getAttribute("for") == id) {
          att.querySelector(".attends-value").innerHTML++;
          return;
        }
      }
    }
  }
};
</script>

<style scoped>
.container {
  margin-top: 15px;
}
.card {
  width: 18rem;
  margin-bottom: 20px;

  /* transition: t2s ease-in 2s; */
}

.card-body {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.card:hover {
  top: -2px;
  box-shadow: 1px 4px 8px rgb(201, 198, 198), -1px 1px 8px rgb(211, 204, 204);
  /* box-shadow: -2px 2px black; */
}
.events {
  margin-top: 20px;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

img {
  width: 100%;
  height: 150px;
  cursor: pointer;
  /* border-radius: 50%; */
}
.eventnav {
  display: flex;
  justify-content: space-between;
}
.no-style {
  text-decoration: none;
  color: initial;
}
.owned h5 {
  font-weight: 900;
}
.ss {
  box-shadow: none;
}

.attend-btns {
  display: flex;
  justify-content: space-between;
}
.attend-btns > * {
  box-shadow: none;
}
</style>
