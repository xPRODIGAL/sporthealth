<template>
  <div class="related_body">
    <div v-for="(item, index) in planData" :key="index">
      <h2>相关动作</h2>
      <h2>{{ item.name }}</h2>
      <video :src="item.plan_url" controls="controls" width="100%"></video>
    </div>
  </div>
</template>

<script>
import { plan } from "../../../network/action";
export default {
  name: "RelatedActions",
  data() {
    return {
      planData: []
    };
  },
  created() {
    plan().then(res => {
      for (let item of res.data) {
        if (item.planId == window.location.href.split("=")[1]) {
          this.planData.push(item);
          // console.log(this.planData);
        }
      }
    });
  }
};
</script>

<style scoped>
ul {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  padding-left: 50px;
  padding-right: 50px;
}
h2 {
  margin-bottom: 20px;
}
li {
  height: 40px;
  width: 33%;
  cursor: pointer;
  font-size: 18px;
  font-weight: inherit;
}

.related_body {
  padding: 20px 20px;
}
</style>
