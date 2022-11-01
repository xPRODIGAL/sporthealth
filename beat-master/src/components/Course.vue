<template>
  <div class="all">
    <div id="course">
      <h2>全部课程</h2>
      <!-- <select_aim></select_aim> -->
      <!-- <select_grade></select_grade> -->
      <course-body></course-body>
    </div>
  </div>
</template>
<script>
import courseBody from "./course/coursebody";
// import selectAim from "./course/selectAim";
// import selectGrade from "./course/selectGrade";
// import IndexCenterFoot from "./IndexCenterFoot";
// import IndexCenterLink from "./IndexCenterLink";

export default {
  name: "course",
  data() {
    return {
      search_key: ""
    };
  },
  components: {
    "course-body": courseBody
    // select_aim: selectAim
    // select_grade: selectGrade
    // IndexCenterFoot: IndexCenterFoot,
    // IndexCenterLink: IndexCenterLink
  }
};
</script>

<style scoped>
#course {
  width: 1180px;
  /*height: 1200px;*/
  /*background: darkseagreen;*/
  margin: auto;
}
h2 {
  margin: 18px 0 0 10px;
}
.IndexCenterFoot {
  width: 1519px;
  /*height: 100px;*/
  /*margin-top: 1900px;*/
  /*margin: auto;*/
}
</style>
