<template>
  <div id="my-plan">
    <div class="train_plan" v-for="(item, index) in planData" :key="index">
      <router-Link :to="{ name: 'plandetail', query: { id: item.planId } }">
        <div class="plan_picture">
          <img
            class="plan_picture_main"
            :src="require('../../img/plan/' + item.img + '.jpg')"
            height="151"
            width="276"
          /></div
      ></router-Link>
      <div class="plan_intro">
        <p class="name">{{ item.name }}</p>
        <p class="plan-skip">{{ item.plan_grade }}</p>
        <p>
          <span>课时：{{ item.week }}周</span
          ><span>天/周：{{ item.day_everyweek }}天</span>
        </p>
        <div class="frequency">
          <p>
            <span
              >强度：<img
                class="full_water"
                v-for="i in item.grade_type"
                src="../../img/满水滴.png"
                height="16"
                width="21"/>
              <img
                v-for="i in 5 - item.grade_type"
                src="../../img/水滴.png"
                height="15"
                width="20"
            /></span>
          </p>
        </div>
      </div>
      <div class="plan-del">
        <el-button type="text" class="button" @click="delPlan(item.planId)"
          >删除计划</el-button
        >
      </div>
    </div>
  </div>
</template>

<script>
import { getPlans, deletePlans } from "../../network/action";
export default {
  name: "my-plan",
  data() {
    return {
      planData: []
    };
  },
  created() {
    getPlans({
      userId: localStorage.getItem("userId")
    }).then(res => {
      // console.log(res.data);
      this.planData = res.data;
    });
  },
  methods: {
    delPlan(planId) {
      deletePlans({ planId }).then(res => {
        console.log(res);
      });
      let index = this.planData.findIndex(ele => ele.planId === planId);
      console.log(index);
      if (index === -1) {
        return console.log("error");
      } else {
        this.planData.splice(index, 1);
      }
    }
  }
};
</script>

<style scoped>
#my-plan {
  min-height: 520px;
}
a {
  color: black;
}
.train_plan {
  padding-left: 5px;
  margin-top: 5px;
  background: white;
  width: 990px;
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
.train_plan .plan_intro {
  width: 230px;
  height: 160px;
  float: left;
}

.train_plan .plan_intro .name {
  margin-top: 4px;
  font-size: 20px;
  width: 300px;
  font-family: Arial, Helvetica, sans-serif;
}

.plan-skip {
  width: 250px;
  font-size: 13px;
  height: 60px;
  font-family: Arial, Helvetica, sans-serif;
}
.plan_intro p span {
  margin-right: 20px;

  font-family: Arial, Helvetica, sans-serif;
}
.frequency {
  margin-top: 10px;
}

.plan-del {
  float: right;
  margin-right: 30px;
  margin-top: 110px;
}
.plan-del .button:hover {
  color: red;
}
.plan-skip {
  width: 650px;
}
</style>
