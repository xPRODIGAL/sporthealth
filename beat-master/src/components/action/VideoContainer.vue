<template>
  <div class="videocontainer">
    <div>
      <el-breadcrumb id="mi" separator="/">
        <el-breadcrumb-item
          v-if="
            !this.$store.state.apparatus_type &&
              !this.$store.state.bodypart_type &&
              !this.$store.state.grade_type
          "
          >所有动作</el-breadcrumb-item
        >
        <el-breadcrumb-item v-if="this.$store.state.grade_type === '初级'">{{
          $store.state.grade_type
        }}</el-breadcrumb-item>
        <el-breadcrumb-item v-if="this.$store.state.grade_type === '中级'">{{
          $store.state.grade_type
        }}</el-breadcrumb-item>
        <el-breadcrumb-item v-if="this.$store.state.grade_type === '高级'">{{
          $store.state.grade_type
        }}</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
    <div class="videoshow">
      <videoshow-main
        v-if="
          !this.$store.state.apparatus_type &&
            !this.$store.state.bodypart_type &&
            !this.$store.state.grade_type
        "
      ></videoshow-main>
      <Video-show1 v-if="this.$store.state.grade_type === '初级'"></Video-show1>
      <Video-show2 v-if="this.$store.state.grade_type === '中级'"></Video-show2>
      <Video-show3 v-if="this.$store.state.grade_type === '高级'"></Video-show3>
    </div>
    <div class="videoshowfooter">
      <!-- <pagebar-main></pagebar-main> -->
    </div>
  </div>
</template>

<script>
import VideoShow from "./VideoShow";
import VideoShow1 from "./VideoShow1";
import VideoShow2 from "./VideoShow2";
import VideoShow3 from "./VideoShow3";
// import PageBar from "./PageBar";
export default {
  name: "VideoContainer",
  data() {
    return {};
  },
  components: {
    "videoshow-main": VideoShow,
    // "pagebar-main": PageBar,
    VideoShow1,
    VideoShow2,
    VideoShow3
  }
};
</script>

<style scoped>
#mi {
  font-size: 25px;
  margin-bottom: 10px;
}
.videoshow {
  width: 100%;
}
.videoshowfooter {
  display: flex;
  justify-content: center;
}
.videocontainer {
  margin-left: 20px;
}
</style>
