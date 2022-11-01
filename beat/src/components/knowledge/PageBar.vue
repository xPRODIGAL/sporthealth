<!--<template>-->
<!--  <el-pagination background="rgba(108,230,84,0.38)"-->
<!--    layout="prev, pager, next"-->
<!--                 @size-change="handleSizeChange"-->
<!--                 @current-change="handleCurrentChange"-->
<!--                 :current-page="currentPage"-->
<!--    >-->
<!--  </el-pagination>-->
<!--</template>-->

<!--<script>-->
<!--    export default {-->
<!--        name: "PageBar",-->
<!--      data(){-->
<!--          return{-->
<!--            total: null,-->
<!--            currentPage: 1,-->

<!--          }-->
<!--      },-->
<!--      methods: {-->
<!--        // 初始页currentPage、初始每页数据数pagesize和数据data-->
<!--        handleSizeChange: function (size) {-->
<!--          this.pagesize = size;-->
<!--          // alert(this.pagesize)-->
<!--          console.log(this.pagesize)  //每页下拉显示数据-->
<!--        },-->
<!--        handleCurrentChange: function (currentPage) {-->
<!--          this.currentPage = currentPage;-->
<!--          // alert(this.currentPage)-->
<!--          console.log(this.currentPage)  //点击第几页-->
<!--        },-->


<!--      }-->
<!--    }-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->


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
