<template>
  <div class="day">
    <div class="title"><span>每周训练天数</span></div>
    <div class="content">
      <button
        class="type-select"
        @click="
          searchbtn(day_init);
          clickfun($event);
        "
      >
        {{ day_init }}
      </button>
      <button
        @click="
          searchbtn(day);
          clickfun($event);
        "
        v-for="day in day_list"
      >
        {{ day }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Day",
  data() {
    return {
      day_init: "不限天数",
      day_list: [],
      day_type: "不限天数"
    };
  },
  methods: {
    clickfun(e) {
      console.log(e.target);
      var nodes = e.target.parentNode.children;
      for (var o of nodes) {
        o.className = "";
      }
      e.target.className = "type-select";
    },
    searchbtn: function(btn) {
      this.day_type = btn;
      if (this.day_type === "不限天数") {
        this.$store.state.day_type = "";
        // this.get_plan();
      } else {
        this.$store.state.day_type = this.day_type;
        // this.get_plan();
      }
    }
    // get_plan: function() {}
  }
};
</script>

<style scoped>
.title {
  margin-bottom: 10px;
  margin-top: 20px;
  opacity: 0.8;
}
.type-select {
  opacity: 1;
  color: white;
  transform: scale(1.1);
}
button {
  outline: none;
  padding: 0;
  margin-left: 8px;
  margin-right: 5px;
  margin-bottom: 5px;
  padding-bottom: 2px;
  height: 20px;
  width: 52px;
  font-size: 12px;
  opacity: 0.7;
  border: 1px solid white;
  background: none;
  color: white;
  cursor: pointer;
}
button:hover {
  opacity: 1;
}
.day {
  width: 280px;
  margin-bottom: 30px;
}
.content {
  display: flex;
  flex-wrap: wrap;
}
</style>
