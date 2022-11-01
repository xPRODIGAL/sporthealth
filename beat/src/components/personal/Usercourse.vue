<template>
  <div class="course" style="display: flex;flex-wrap: wrap;">
    <div v-for="item in Info">
      <div class="course_part">
        <router-link to="">
          <div class="course_show">
            <img src="../../img/轮播图2.jpg" height="191" width="325" />
          </div>
        </router-link>
        <p>
          <strong></strong>
        </p>
        <p>
          <span></span>
          <span>{{ item.apparatus }}</span>
          <span>{{ item.bodypart }}</span>
        </p>
        <div class="shanchu">
          <el-button type="text" class="button">删除</el-button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Usercord",
  data() {
    return {
      Info: {
        name: "四足俯卧撑",
        grade: "低级",
        apparatus: "杠铃",
        bodypart: "前臂",
        pic: "",
        img: ""
      }
    };
  },

  components: {},
  created() {}
};
</script>

<style scoped>
.course_part {
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: 0.5s;
  margin-left: 8px;
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
