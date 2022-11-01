<template>
  <div class="video">
    <video :src="this.videoSrc" controls="controls"></video>
  </div>
</template>

<script>
import { action } from "../../../network/action";
export default {
  name: "Video",
  data() {
    return {
      videoSrc: ""
    };
  },
  mounted() {
    // console.log(window.location.search);
    // console.log(window.location.href);
    // console.log(window.location.href.split("="));

    action().then(res => {
      for (let item of res.data) {
        // console.log(item);
        if (item.actionId == window.location.href.split("=")[1]) {
          this.videoSrc = item.action_url;
        }
      }
    });
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
