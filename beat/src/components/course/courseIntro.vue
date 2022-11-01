<template>
  <div class="course_detail">
    <div v-for="(item, index) in introData" :key="index">
      <p class="zi">视频介绍</p>
      <el-divider></el-divider>
      <div class="right_details">
        <p>
          <strong>{{ item.course_name }}</strong>
        </p>

        <ul>
          <li>
            <span>目的:{{ item.course_aim }}</span>
          </li>
          <li>
            <span>难度:{{ item.course_inst }}</span>
          </li>
          <li>
            <span>消耗:{{ item.course_burn }}</span>
          </li>
        </ul>
        <ul>
          <li>
            <span>时长:{{ item.course_time }}</span>
          </li>
          <li>
            <span>训练次数:{{ item.degree }}次</span>
          </li>
        </ul>
      </div>
      <el-divider></el-divider>
      <div class="right_intro">
        <p>
          视频简介:
          <span>{{ item.course_intro }}</span>
        </p>
        <br />
      </div>
    </div>
  </div>
</template>

<script>
import { course } from "../../network/course";
export default {
  name: "courseIntro",
  data() {
    return {
      introData: []
    };
  },
  created() {
    // console.log(window.location.href.split("="));
    course().then(res => {
      for (let item of res.data) {
        if (item.courseId == window.location.href.split("=")[1])
          this.introData.push(item);
      }
    });
  }
};
</script>

<style scoped>
.zi {
  margin-top: 5px;
}
.right_details .time {
  margin-left: 5px;
  color: #464646;
}

.right p {
  font-size: 15px;
  margin-bottom: 5px;
}
.right span {
  margin-right: 10px;
  margin-bottom: 10px;
}
/*.right_details span{*/
/*  margin-top: 0;*/
/*}*/
ul {
  width: 100%;
  display: flex;
  margin-left: 10px;
  margin-top: 5px;
}
ul li {
  width: 120px;
  height: 30px;
  font-size: 15px;
  color: #464646;
}
.right_details p {
  font-size: 20px;
  margin-left: 10px;
  margin-top: 20px;
  color: #464646;
}
.right_intro p {
  margin-left: 10px;
  font-size: 15px;
  height: 80px;
  margin-bottom: 10px;
  color: #464646;
}
.right_intro p span {
  font-size: 15px;
}
</style>
