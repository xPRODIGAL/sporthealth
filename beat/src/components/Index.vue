<template>
  <div id="index">
    <index-video></index-video>
    <index-center></index-center>
  </div>
</template>

<script>
import IndexVideo from "./index/IndexVideoPlay";
import IndexCenter from "./index/IndexCenter";
export default {
  name: "index",
  data() {
    return {
      search_key: ""
    };
  },
  components: {
    "index-video": IndexVideo,
    "index-center": IndexCenter
  },
  created() {
    if (localStorage.getItem("token")) {
      this.$store.state.login_status = true;
    } else {
      this.$store.state.login_status = false;
    }
  }
};
</script>
<style scoped>
#index {
  width: 100%;
  margin: auto;
}
#index .header {
  width: 1180px;
}
</style>
