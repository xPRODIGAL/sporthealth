<template>
  <div class="aim">
    <div class="title"><span>训练目标</span></div>
    <div class="content">
      <button
        class="type-select"
        @click="
          searchbtn(aim_init);
          clickfun($event);
        "
      >
        {{ aim_init }}
      </button>
      <button
        @click="
          searchbtn(aim);
          clickfun($event);
        "
        v-for="aim in aim_list"
        :key="aim"
      >
        {{ aim }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Aim",
  data() {
    return {
      aim_init: "不限目标",
      aim_list: ["减脂", "塑形", "增肌"],
      aim_type: "不限目标"
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
      this.aim_type = btn;
      if (this.aim_type === "不限目标") {
        this.$store.state.aim_type = "";
      } else {
        this.$store.state.aim_type = this.aim_type;
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
.type-select {
  opacity: 1;
  color: white;
  transform: scale(1.1);
}
.aim {
  width: 280px;
  margin-bottom: 30px;
}
.content {
  display: flex;
  flex-wrap: wrap;
}
</style>
