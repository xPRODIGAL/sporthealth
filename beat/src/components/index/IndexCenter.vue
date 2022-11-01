<template>
  <div class="index_center">
    <div class="index_show">
      <index_center_title></index_center_title>
      <index_center_course></index_center_course>
      <index_center_plan></index_center_plan>
      <index_center_active></index_center_active>
    </div>
    <div class="index_count">
      <index_center_count></index_center_count>
    </div>
    <div class="index_link">
      <index_center_link></index_center_link>
    </div>
    <div class="index_foot">
      <index_center_foot></index_center_foot>
    </div>
  </div>

</template>

<script>
  import IndexCenterTitle from './IndexCenterTitle'
  import IndexCenterCourse from './IndexCenterCourse'
  import IndexCenterPlan from "./IndexCenterPlan";
  import IndexCenterActive from "./IndexCenterActive";
  import IndexCenterCount from "./IndexCenterCount";
  import IndexCenterLink from "./IndexCenterLink";
  import IndexCenterFoot from "./IndexCenterFoot";

    export default {
        name: "index_center",

      components:{
        "index_center_title":IndexCenterTitle,
        "index_center_course":IndexCenterCourse,
        "index_center_plan":IndexCenterPlan,
        "index_center_active":IndexCenterActive,
        "index_center_count":IndexCenterCount,
        "index_center_link":IndexCenterLink,
        "index_center_foot":IndexCenterFoot,

      }
    }

</script>

<style scoped>
  .index_center{
    width: 100%;
    margin: auto;
    /*background: #ed3a4a;*/
    /*height: 500px;*/
  }
  .index_center .index_show{
    width: 1180px;
    margin: auto;
  }
  .index_link,.index_count,.index_foot{
    width: 1519px;
    margin: auto;
  }

</style>
