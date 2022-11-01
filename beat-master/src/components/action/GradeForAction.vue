<template>
  <div class="grade">
    <div class="title"><span>训练难度</span></div>
    <div class="content">
      <button
        class="type-select"
        @click="
          searchbtn(grade_init);
          clickfun($event);
        "
      >
        {{ grade_init }}
      </button>
      <button
        @click="
          searchbtn(grade);
          clickfun($event);
        "
        v-for="grade in grade_list"
      >
        {{ grade }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Grade",
  data() {
    return {
      grade_init: "不限难度",
      grade_list: ["初级", "中级", "高级"],
      grade_type: "不限难度"
    };
  },
  methods: {
    clickfun(e) {
      // console.log(e.target);
      var nodes = e.target.parentNode.children;
      for (var o of nodes) {
        o.className = "";
      }
      e.target.className = "type-select";
    },
    searchbtn: function(btn) {
      this.grade_type = btn;
      // console.log(this.grade_type);
      if (this.grade_type === "不限难度") {
        this.$store.state.grade_type = "";
      } else {
        this.$store.state.grade_type = this.grade_type;
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
.grade {
  width: 280px;
  margin-bottom: 30px;
}
.content {
  display: flex;
  flex-wrap: wrap;
}
</style>
