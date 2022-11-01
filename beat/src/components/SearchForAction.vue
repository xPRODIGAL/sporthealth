<template>
  <div id="search">
    <input
      type="text"
      v-model="meg"
      @click="jihuaming"
      @focusout="leave"
      @keypress="search"
    /><el-button
      @click="search"
      class="button"
      type="primary"
      icon="el-icon-search"
    ></el-button>
  </div>
</template>

<script>
export default {
  name: "search",
  data() {
    return {
      meg: "动作名"
    };
  },
  methods: {
    jihuaming: function() {
      if (this.meg == "动作名") {
        this.meg = "";
        this.$store.state.search = "";
      } else if (this.meg == "") {
        this.meg = "";
        this.$store.state.search = "";
      } else {
        this.$store.state.search = this.meg;
      }
    },
    leave: function() {
      if (this.meg == "动作名") {
        this.meg = "动作名";
        this.$store.state.search = "";
      } else if (this.meg == "") {
        this.meg = "动作名";
        this.$store.state.search = "";
      } else {
        this.$store.state.search = this.meg;
      }
    },
    search: function() {
      if (this.meg == "计划名") {
        this.$store.state.search = "";
      } else if (this.meg == "") {
        this.$store.state.search = "";
      } else {
        this.$store.state.search = this.meg;
      }
    }
  },
  created() {}
};
</script>

<style scoped>
#search {
  margin-left: 10px;
  margin-top: 20px;
}
input {
  height: 20px;
  width: 150px;
  border: 1px solid white;
  color: white;
  margin-left: 30px;
  background: rgba(0, 0, 0, 0.04);
  opacity: 0.8;
}
.button {
  position: relative;
  top: 3px;
  padding: 0;
  margin-left: 5px;
  height: 25px;
  width: 25px;
  outline: none;
  border: none;
  background: none;
  color: white;
  font-size: 1.3em;
  opacity: 0.8;
}
</style>
