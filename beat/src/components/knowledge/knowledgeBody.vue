<template>
  <div class="body">
    <p>健身资讯</p>
    <div class="int">
      <p><strong>减脂</strong></p>
      <div class="lose" v-for="(item, index) in loseData" :key="index">
        <el-divider style="color: #343434"></el-divider>
        <div class="lose1" @click="click_info(item.id)">
          <img
            :src="require('../../img/knowledge/' + item.img + '.jpg')"
            alt=""
            width="230px"
            height="170px"
          />
          <div class="wen">
            <span class="zi">{{ item.title }}</span>
            <br />
            <span style="font-size: 14px"> 十点资讯</span>
            <br /><br />
            <span>{{ item.article }}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="int">
      <p><strong style="color: #343434">增肌</strong></p>
      <div class="gain" v-for="(item, index) in gainData" :key="index + 'info'">
        <el-divider></el-divider>
        <div class="lose1" @click="click_info(item.id)">
          <img
            :src="require('../../img/knowledge/' + item.img + '.jpg')"
            alt=""
            width="230px"
            height="170px"
          />
          <div class="wen">
            <span class="zi">{{ item.title }}</span>
            <br />
            <span style="font-size: 14px"> 十点资讯</span>
            <br /><br />
            <span>{{ item.article }}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="int">
      <p><strong style="color: #343434">塑形</strong></p>
      <div
        class="sculpt"
        v-for="(item, index) in sculptData"
        :key="index + 'xr'"
      >
        <el-divider></el-divider>
        <div class="lose1" @click="click_info(item.id)">
          <img
            :src="require('../../img/knowledge/' + item.img + '.jpg')"
            alt=""
            width="230px"
            height="170px"
          />
          <div class="wen">
            <span class="zi">{{ item.title }}</span
            ><br />
            <span style="font-size: 14px"> 十点资讯</span>
            <br /><br />
            <span>{{ item.article }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { knowledge } from "../../network/knowledge";
export default {
  name: "knowlegdebody",
  data() {
    return { loseData: [], gainData: [], sculptData: [] };
  },
  methods: {
    click_info(id) {
      this.$router.push({ path: "/knowLedgeInfo?id=" + id });
    }
  },
  mounted() {
    knowledge().then(res => {
      // console.log(res);
      for (let item of res.data) {
        if (item.type == "减脂") {
          this.loseData.push(item);
        } else if (item.type == "增肌") {
          this.gainData.push(item);
        } else {
          this.sculptData.push(item);
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
.lose {
  width: 1180px;
  background: white;
  margin-left: 10px;
  margin-top: 30px;
}
p {
  font-size: 26px;
  background: white;
}
.lose1 {
  width: 1100px;
  height: 180px;
  background: white;
  margin-bottom: 10px;
}

img {
  margin-top: 5px;
  margin-left: 5px;
  margin-right: 5px;
  float: left;
}
.wen {
  width: 845px;
  height: 170px;
  float: right;
  overflow: hidden;
}

.zi {
  font-size: 20px;
  color: #ed0c1c;
  cursor: pointer;
}

.gain {
  width: 1180px;
  margin-left: 10px;
  margin-top: 40px;
}
.sculpt {
  width: 1180px;
  margin-left: 10px;
  margin-top: 40px;
  margin-bottom: 40px;
}

.body .int {
  margin-bottom: 100px;
}
</style>
