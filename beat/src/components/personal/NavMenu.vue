<template>
  <div>
    <el-menu
      :default-active="activeIndex"
      style="width: 1000px;margin-left: -20px;border-bottom: none"
      mode="horizontal"
      @select="handleSelect"
    >
      <!-- <el-menu-item index="1"
        ><router-link to="/personal/usercord"
          >运动记录</router-link
        ></el-menu-item
      > -->
      <el-menu-item index="1">
        <router-link to="/personal/mycollection">我的收藏</router-link>
      </el-menu-item>
      <el-menu-item index="2"
        ><router-link to="/personal/myplan">我的计划</router-link></el-menu-item
      >
      <el-menu-item index="3"
        ><router-link to="/personal/mycoment"
          >我的评论</router-link
        ></el-menu-item
      >
      <el-menu-item index="4"
        ><router-link to="/personal/myset">设置</router-link></el-menu-item
      >
    </el-menu>
  </div>
</template>

<script>
export default {
  name: "nav-main",
  data() {
    return {
      activeIndex: "1"
      // activeIndex2: "2"
    };
  },
  methods: {
    handleSelect(key, keyPath) {}
    // shoucang: function() {
    //   this.$router.push("/personal/mycollection");
    // }
    // video_shoucang: function() {
    //   this.$router.push("/personal/collectionvideo");
    // }
  }
};
</script>

<style scoped>
a {
  text-decoration: none;
  color: black;
}

.tac {
  min-height: 800px;
}
</style>
