<template>
  <div id="action">
    <side-bar class="left"></side-bar>
    <video-container class="right"></video-container>
  </div>
</template>

<script>
import VideoContainer from "./action/VideoContainer";
import SidebarAction from "./action/SidebarAction";
export default {
  name: "action",
  data() {
    return {};
  },
  components: { "side-bar": SidebarAction, "video-container": VideoContainer }
  // created() {
  //     this.$store.state.search='',
  //     this.$store.state.page_index=1,
  //     this.$store.state.apparatus_type='',
  //     this.$store.state.grade_type='',
  //     this.$store.state.body_type=''
  // }
};
</script>

<style scoped>
#action {
  display: flex;
}
.right {
  margin-top: 10px;
  min-width: 1199px;
  min-height: 660px;
  width: 100%;
}
#action {
  min-height: 700px;
  padding-bottom: 20px;
}
</style>
