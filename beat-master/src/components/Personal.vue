<template>
  <el-container class="container">
    <el-header class="heads">
      <el-main class="nav-heads"><nav-avatar></nav-avatar></el-main>
      <el-footer class="nav-footer"><nav-menu></nav-menu></el-footer>
    </el-header>
    <el-container class="nav-container">
      <el-main style="padding: 0px"><router-view></router-view></el-main>
    </el-container>
  </el-container>
</template>
<script>
import Avatar from "./personal/Avatar";
import NavMenu from "./personal/NavMenu";
export default {
  name: "personal",
  data() {
    return {};
  },
  components: {
    "nav-avatar": Avatar,
    "nav-menu": NavMenu
  },
  created: function() {
    if (localStorage.getItem("token")) {
      this.$router.push("/personal/mycollection");
    } else {
      this.$router.push("/login");
    }
  },
  watch: {
    $route(to, from) {
      // console.log(to.name);
      if (to.name === "personal" || to.name === "mycollection") {
        this.$router.push("/personal/mycollection");
      }
    }
  }
};
</script>

<style scoped>
/*身体部分样式*/
.container {
  width: 1000px;
  margin: auto;
  background: white;
  /*text-align: center;*/
  display: flex;
  margin-bottom: 20px;
}
/*身体部分样式*/
/*****head****/
/*顶部容器样式*/
.heads {
  padding: 0px;
  flex: 3;
}
.heads .nav-heads {
  /*height: 200px;*/
  width: 100%;
  background-image: url("../img/4.jpg");
  background-position: 0 0, 0 0;
  background-size: cover;
  background-repeat: no-repeat;
}
.heads .nav-footer {
  height: 100px;
  margin: auto;
  /*background: greenyellow;*/
}
/*顶部容器样式*/

/******************************************body*************************************************/
/*主体部分样式*/
.nav-container {
  flex: 7;
}
.nav-aside {
  width: 300px;
  height: 500px;
  /*background: green;*/
}
</style>
