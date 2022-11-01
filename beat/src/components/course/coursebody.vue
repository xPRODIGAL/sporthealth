<template>
  <div class="coursecontainer">
    <div class="courseshow"><courseshow-main></courseshow-main></div>
    <!-- <div class="courseshowfooter"><pagebar-main></pagebar-main></div> -->
  </div>
</template>

<script>
import CourseShow from "../course/courseShow";
// import PageBar from "./PageBar";

export default {
  name: "CourseContainer",
  data() {
    return {};
  },
  components: { "courseshow-main": CourseShow }
};
</script>

<style scoped>
.courseshowfooter {
  display: flex;
  justify-content: center;
  margin-bottom: 30px;
  margin-top: 30px;
}
.coursecontainer {
  /*margin-left: 20px;*/
  margin-top: 40px;
}
</style>
