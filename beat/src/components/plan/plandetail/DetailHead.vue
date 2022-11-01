<template>
  <div class="large_picture">
    <div v-for="(item, index) in planData" :key="index">
      <!-- <p><img :src="pic" /></p> -->
      <p>
        <img :src="require('../../../img/plan/' + item.img_url + '.jpg')" />
      </p>
      <p class="name">{{ item.name }}</p>
      <p class="info">{{ item.plan_grade }}</p>
    </div>
  </div>
</template>

<script>
import { plan } from "../../../network/action";
export default {
  name: "DetailHead",
  data() {
    return {
      planData: []
    };
  },

  created() {
    plan().then(res => {
      for (let item of res.data) {
        if (item.planId == window.location.href.split("=")[1]) {
          // this.pic = `/public/img/plan/${item.img_url}.png`;
          this.planData.push(item);
        }
      }
    });
  }
  // computed: {
  //   imgPath() {
  //     return `../../../img/plan/${this.pic}.png`;
  //   }
  // }
};
</script>

<style scoped>
.large_picture {
  position: relative;
  overflow: hidden;
  text-align: center;
}

.large_picture img {
  width: 1020px;
  height: 486px;
}
.large_picture .name {
  position: absolute;
  left: 20%;
  top: 15%;
  font-size: 55px;
  color: white;
}

.large_picture .info {
  position: absolute;
  color: white;
  font-size: 25px;
  width: 480px;
  left: 15%;
  top: 45%;
}
</style>
