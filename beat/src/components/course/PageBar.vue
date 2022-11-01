<template>
  <el-pagination background=""
    layout="prev, pager, next"
    :total="page_max*10">
  </el-pagination>
</template>

<script>
    export default {
        name: "PageBar",
      data(){
          return{
              page_max:10
          }
      }
    }
</script>

<style scoped>

</style>
