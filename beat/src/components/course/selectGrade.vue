<template>
  <el-select
    v-model="values"
    placeholder="难度"
    class="selected2"
    @change="searchcoursebygrade(values)"
  >
    <el-option :value="option_init"> </el-option>
    <el-option v-for="item in options" :value="item.grade_level"> </el-option>
  </el-select>
</template>

<script>
export default {
  data() {
    return {
      options: [],
      values: "",
      option_init: "不限"
    };
  },
  created() {},
  methods: {
    searchcoursebygrade: function(a) {
      if (a == "不限") {
        this.$store.state.values = "";
        // this.getcourse();
      } else {
        this.$store.state.values = a;
        // this.getcourse();
      }
      console.log(a);
    }
    // getcourse: function() {}
  }
};
</script>
<style>
.selected2 {
  width: 120px;
  height: 25px;
  margin-top: 10px;
  margin-left: 20px;
}
</style>
