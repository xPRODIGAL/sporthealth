<template>
  <div id="plan">
    <side-bar class="left"></side-bar>
    <plancontainer-main class="right"></plancontainer-main>
  </div>
</template>

<script>
import PlanContainer from "./plan/PlanContainer";
import Sidebar from "./plan/SidebarTran";
export default {
  name: "plan",
  data() {
    return {};
  },
  components: { "side-bar": Sidebar, "plancontainer-main": PlanContainer },
  created() {
    (this.$store.state.search = ""),
      (this.$store.state.aim_type = ""),
      (this.$store.state.day_type = ""),
      (this.$store.state.apparatus_type = ""),
      (this.$store.state.grade_type = ""),
      (this.$store.state.body_type = "");
  }
};
</script>

<style scoped>
#plan {
  display: flex;
  min-height: 1800px;
  padding-bottom: 20px;
}
.right {
  width: 580px;
}
</style>
