<template>
  <el-pagination background layout="prev, pager, next" :total="page_max * 10">
  </el-pagination>
</template>

<script>
export default {
  name: "PageBar",
  data() {
    return {
      page_max: 4,
      pageNo: 1
    };
  },

  created() {
    // this.get_page();
    // this.pageNo = Number(localStorage.getItem("pagination")) || 1;
    // this.pageChange(this.pageNo);
  },

  beforeUpdate() {
    // localStorage.setItem("pagination", this.pageNo);
  },

  beforeDestroy() {
    // localStorage.setItem("pagination", "1");
  },

  methods: {},
  computed: {},
  watch: {}
};
</script>

<style scoped></style>
