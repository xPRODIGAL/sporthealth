<template>
  <div class="apparatus">
    <div class="title"><span>器械要求</span></div>
    <div class="content">
      <button
        class="type-select"
        @click="
          searchbtn(apparatus_init);
          clickfun($event);
        "
      >
        {{ apparatus_init }}
      </button>
      <button
        @click="
          searchbtn(apparatus.name);
          clickfun($event);
        "
        v-for="apparatus in apparatus_list"
      >
        {{ apparatus.name }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Apparatus",
  data() {
    return {
      apparatus_init: "不限器械",
      apparatus_list: [],
      apparatus_type: "不限器械"
    };
  },
  created() {},
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
      this.apparatus_type = btn;
      if (this.apparatus_type === "不限器械") {
        this.$store.state.apparatus_type = "";
      } else {
        this.$store.state.apparatus_type = this.apparatus_type;
      }
    }
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
.apparatus {
  width: 280px;
  margin-bottom: 30px;
}
.content {
  display: flex;
  flex-wrap: wrap;
}
</style>
