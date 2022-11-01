<template>
  <div>
    <div v-for="(item, index) in videoData" :key="index">
      <div class="videojieshao">
        <span>{{ item.action_name }}</span>
      </div>
      <div class="videojieshao_down">
        <p>
          <span>锻炼部位 ：{{ item.action_part }}</span
          ><span>等级 ：{{ item.action_type }}</span
          ><span>器械要求 ：{{ item.action_inst }}</span>
        </p>
        <p>
          <span>Tips ：{{ item.tips }}</span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { action } from "../../../network/action";
export default {
  name: "VideoInfo",
  data() {
    return { videoData: [] };
  },
  created() {
    console.log(window.location.href.split("="));

    action().then(res => {
      for (let item of res.data) {
        if (item.id == window.location.href.split("=")[1]) {
          this.videoData.push(item);
        }
      }
    });
  }
};
</script>

<style scoped>
.videojieshao {
  width: 1000px;
  height: 50px;
  line-height: 50px;
  margin: auto;
  margin-bottom: 1px;
  background-color: white;
  /*padding-left: 10px;*/
}
.videojieshao span {
  padding-left: 10px;
  font-size: 20px;
}

.videojieshao_down {
  width: 1000px;
  margin: auto;
  margin-bottom: 4px;
  background-color: white;
}
.videojieshao_down span {
  margin-left: 10px;
  margin-right: 60px;
}
</style>
