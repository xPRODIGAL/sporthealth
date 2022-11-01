<template>
  <div
    class="course"
    style="display: flex;flex-wrap: wrap;justify-content: space-between"
  >
    <div class="course_part">
      <router-link to="">
        <div class="course_show">
          <img src="../../../img/四足俯卧撑.png" height="191" width="325" />
        </div>
        <p>
          <strong>四足俯卧撑</strong>
        </p>
      </router-link>
      <p>
        <span> 低级</span>
        <span>杠铃</span>
        <span>前臂</span>
      </p>
      <div class="shanchu">
        <el-button type="text" class="button">删除</el-button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Usercord",
  data() {
    return {};
  },

  components: {},
  created() {}
};
</script>

<style scoped>
.course_part {
  background: white;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: 0.5s;
}
.course_part .course_show:hover {
  box-shadow: 0px 0px 10px gray;
  /*transform: translate(0px,-5px);*/
}
a {
  text-decoration: none;
  color: black;
}
span {
  font-family: "SimHei";
}
.shanchu {
  float: right;
  margin-top: -25px;
}
.shanchu .button:hover {
  color: red;
}
</style>
