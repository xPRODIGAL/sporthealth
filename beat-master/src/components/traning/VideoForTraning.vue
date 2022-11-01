<template>
  <div class="video">
    <video
      src="https://static.ouj.com/hiyd_cms/file/48380f66632045a099677c70d64f6086.mp4"
      controls="controls"
    ></video>
  </div>
</template>

<script>
export default {
  name: "Video",

  data() {
    return {
      video: ""
    };
  },
  created() {
    this.video = this.$store.state.video_info;
  }
};
</script>

<style scoped>
.video {
  width: 100%;
  margin: auto;
}
video {
  width: 100%;
}
</style>
