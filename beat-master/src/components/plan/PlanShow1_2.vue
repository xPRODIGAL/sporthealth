<template>
  <div>
    <div class="train_plan" v-for="(item, index) in planData" :key="index">
      <div class="plan_picture" @click="get_planId(item.planId)">
        <img
          class="plan_picture_main"
          :src="require('../../img/plan/' + item.img_url + '.jpg')"
          height="151"
          width="276"
        />
      </div>
      <div class="planjieshao">
        <p class="name">{{ item.name }}</p>
        <p class="plan_tiaozhuan">{{ item.biaoyu }}</p>
        <p>
          <span>课时：{{ item.week }}周</span
          ><span>天/周：{{ item.day_everyweek }}天</span>
        </p>
        <div class="frequency">
          强度：
          <img
            class="full_water"
            v-for="i in item.grade_level"
            src="../../img/满水滴.png"
            height="16"
            width="21"
          />
          <img
            v-for="i in item.no_grade_level"
            src="../../img/水滴.png"
            height="15"
            width="20"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { plan } from "../../network/action";
export default {
  name: "PlanShow",
  data() {
    return {
      planData: [],
      planData1: []
    };
  },
  computed: {
    plan() {
      return this.$store.state.plan;
    }
  },
  watch: {
    plan: function() {
      this.planData = this.$store.state.plan;
    }
  },
  methods: {
    get_planId(id) {
      console.log(id);
      this.$router.push("/plandetail?id=" + id);
    }
  },
  mounted() {
    plan().then(res => {
      console.log(res);
      for (let item of res.data) {
        if (item.aim_type == "塑形") {
          this.planData.push(item);
        }
      }
    });
  }
};
</script>

<style scoped>
a {
  color: black;
}
.train_plan {
  padding-left: 10px;
  background: white;
  width: 590px;
  height: 160px;
  margin-bottom: 1px;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: 0.3s;
}
.train_plan:hover {
  box-shadow: 0px 0px 10px gray;
}
.train_plan .plan_picture {
  margin-top: 4px;
  width: 290px;
  height: 151px;
  float: left;
  margin-right: 10px;
  overflow: hidden;
}
.train_plan .plan_picture img {
  width: 100%;
}
.train_plan .plan_picture img:hover {
  transition: 1s;
  transform: scale(1.1);
}
.train_plan .planjieshao {
  width: 230px;
  height: 160px;
  float: left;
}

.train_plan .planjieshao .name {
  margin-top: 4px;
  font-size: 20px;
  width: 300px;
  font-family: Arial, Helvetica, sans-serif;
}

.plan_tiaozhuan {
  width: 250px;
  font-size: 13px;
  height: 80px;
  font-family: Arial, Helvetica, sans-serif;
}
.planjieshao p span {
  margin-right: 20px;
  font-family: Arial, Helvetica, sans-serif;
}
.full_water {
  position: relative;
  top: 1px;
}
.frequency img {
  box-sizing: border-box;
}
</style>
