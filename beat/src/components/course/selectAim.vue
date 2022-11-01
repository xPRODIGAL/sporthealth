<template>
  <el-select
    v-model="value"
    placeholder="目的"
    class="selected"
    @change="searchcoursebyaim(value)"
  >
    <el-option :value="option_init"> </el-option>
    <el-option v-for="item in options" :value="item.aim_name"> </el-option>
  </el-select>
</template>

<script>
export default {
  data() {
    return {
      options: [],
      value: "",
      option_init: "不限"
    };
  },
  created() {},
  methods: {
    searchcoursebyaim: function(a) {
      if (a == "不限") {
        this.$store.state.value = "";
        this.getcourse();
      } else {
        this.$store.state.value = a;
        this.getcourse();
      }
      console.log(a);
    },
    getcourse: function() {}
  }
};
</script>

<style>
.selected {
  width: 120px;
  height: 25px;
  margin-top: 10px;
  margin-left: 0;
}
</style>
