<template>
  <div id="tools">
    <tools_crumbs></tools_crumbs>
    <router-view></router-view>
  </div>
</template>

<script>
import ToolsCrumbs from "./tools/ToolsCrumbs";

export default {
  name: "tools",
  data() {
    return {};
  },
  components: {
    tools_crumbs: ToolsCrumbs
  },

  watch: {
    $router(to, from) {
      // console.log(to.name);
      if (to.name === "tools/tooldetailtwo") {
        this.$router.push("/tools/tooldetailtwo");
      }
      if (to.name === "tools" || to.name === "toolcenter") {
        this.$router.push("/tools/toolcenter");
      }
    }
  }
};
</script>

<style scoped>
#tools {
  background: white;
}
</style>
