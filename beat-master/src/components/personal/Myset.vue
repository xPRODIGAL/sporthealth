<template>
  <el-container>
    <el-aside width="200px">
      <nav-info></nav-info>
    </el-aside>
    <el-main style="border: 1px black solid">
      <router-view></router-view>
    </el-main>
  </el-container>
</template>

<script>
    import NavLeft from "./saiting/NavLeft";

    export default {
      name: "Myset",
      data(){
          return{

          }
      },
      components:{
        "nav-info":NavLeft,
      },
      created:function(){
        this.$router.push('/personal/myset/userinfo');
      },
    }
</script>

<style scoped>

</style>
