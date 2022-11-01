<template>
  <div class="bodypart">
    <div class="title"><span>身体部位</span></div>
    <div class="content">
      <button
        class="type-select"
        @click="
          searchbtn(body_init);
          clickfun($event);
        "
      >
        {{ body_init }}
      </button>
      <button
        @click="
          searchbtn(body.part_name);
          clickfun($event);
        "
        v-for="body in body_list"
      >
        {{ body.part_name }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Bodypart",
  data() {
    return {
      body_list: [],
      body_init: "不限部位",
      body_type: ""
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
      this.body_type = btn;
      if (this.body_type === "不限部位") {
        this.$store.state.bodypart_type = "";
      } else {
        this.$store.state.bodypart_type = this.body_type;
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
.bodypart {
  width: 280px;
  margin-bottom: 30px;
}
.content {
  display: flex;
  flex-wrap: wrap;
}
</style>
