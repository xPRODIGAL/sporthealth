<template>
  <div>
    <div class="mi-container">
      <el-breadcrumb id="mi" separator="/">
        <el-breadcrumb-item
          v-if="
            !this.$store.state.aim_type &&
              !this.$store.state.apparatus_type &&
              !this.$store.state.bodypart_type &&
              !this.$store.state.day_type &&
              !this.$store.state.grade_type
          "
          >所有训练计划</el-breadcrumb-item
        >
        <el-breadcrumb-item v-if="this.$store.state.aim_type">{{
          $store.state.aim_type
        }}</el-breadcrumb-item>
        <el-breadcrumb-item v-if="this.$store.state.day_type">{{
          $store.state.day_type
        }}</el-breadcrumb-item>
        <el-breadcrumb-item v-if="this.$store.state.apparatus_type">{{
          $store.state.apparatus_type
        }}</el-breadcrumb-item>
        <el-breadcrumb-item v-if="this.$store.state.bodypart_type">{{
          $store.state.bodypart_type
        }}</el-breadcrumb-item>
        <el-breadcrumb-item v-if="this.$store.state.grade_type">{{
          $store.state.grade_type
        }}</el-breadcrumb-item>
      </el-breadcrumb>
    </div>
    <div class="planshow-container">
      <planshow-main
        v-if="
          !this.$store.state.aim_type &&
            !this.$store.state.apparatus_type &&
            !this.$store.state.bodypart_type &&
            !this.$store.state.grade_type
        "
      ></planshow-main>
      <Plan-show1
        v-if="
          this.$store.state.aim_type == '减脂' && !this.$store.state.grade_type
        "
      ></Plan-show1>
      <Plan-show1_2
        v-if="
          this.$store.state.aim_type == '塑形' && !this.$store.state.grade_type
        "
      ></Plan-show1_2>
      <Plan-show1_2_3
        v-if="
          this.$store.state.aim_type == '增肌' && !this.$store.state.grade_type
        "
      ></Plan-show1_2_3>
    </div>
  </div>
</template>

<script>
import PlanShow from "./PlanShow";
import PlanShow1 from "./PlanShow1";
import PlanShow1_2 from "./PlanShow1_2";
import PlanShow1_2_3 from "./PlanShow1_2_3";

export default {
  name: "PlanContainer",
  data() {
    return {};
  },
  components: {
    "planshow-main": PlanShow,
    PlanShow1,
    PlanShow1_2,
    PlanShow1_2_3
  }
};
</script>

<style scoped>
.mi-container {
  width: 100%;
  margin-left: 100px;
}
#mi {
  position: relative;
  background: white;
  height: 40px;
  line-height: 40px;
  padding-left: 10px;
  width: 590px;
  font-size: 25px;
  margin-bottom: 1px;
}
.planshow-container {
  width: 100%;
  margin-left: 100px;
}
</style>
