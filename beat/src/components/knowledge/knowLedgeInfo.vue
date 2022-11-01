<template>
  <div class="body">
    <p>健身资讯</p>
    <div class="classify" v-for="(item, index) in imgData" :key="index">
      <p>
        <strong>{{ item.type }}</strong>
      </p>
      <el-divider style="color: #343434"></el-divider>
      <div class="classify1">
        <img
          :src="require('../../img/knowledge/' + item.img + '.jpg')"
          alt=""
          width="700px"
          height="200px"
        />
      </div>
      <div class="wen">
        <span class="zi">{{ item.title }}</span
        ><br />
        <span style="font-size: 14px"> 十点资讯</span>
        <br /><br />
        <div style="white-space:normal; word-break:break-all;overflow:hidden;">
          {{ item.article }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { knowledge } from "../../network/knowledge";

export default {
  name: "knowlegeinfo",
  data() {
    return {
      imgData: []
    };
  },

  mounted() {
    console.log(window.location.href.split("="));
    knowledge().then(res => {
      console.log(res);
      for (let item of res.data) {
        if (item.id == window.location.href.split("=")[1]) {
          this.imgData.push(item);
        }
      }
    });
  }
};
</script>

<style scoped>
.body {
  padding-bottom: 50px;
  width: 100%;
  background: white;
  overflow: hidden;
}
.classify {
  width: 1180px;
  background: white;
  margin: 30px auto;
}
p {
  font-size: 26px;
  background: white;
}
.classify1 {
  width: 1180px;
  height: 240px;
  background: white;
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}
img {
  margin-top: 5px;
}
.wen {
  width: 845px;
  margin: 10px auto;
  text-align: center;
}
.wen span {
  font-size: 16px;
  margin-right: 20px;
}
.zi {
  font-size: 20px;
  color: #ed0c1c;
  cursor: pointer;
}
</style>
