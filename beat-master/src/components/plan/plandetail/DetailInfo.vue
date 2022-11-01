<template>
  <div class="plan_first" id="plan_first">
    <div v-for="(item, index) in planData" :key="index">
      <div class="plan_first_left">
        <p>{{ item.name }}</p>
        <span>课时：{{ item.week }}周</span
        ><span>天/周：{{ item.day_everyweek }}天</span
        ><span>强度：{{ item.grade_type }}</span>
      </div>
      <div class="plan_first_right">
        <el-button
          class="addplan"
          id="addplan"
          type="button"
          @click="open(item.planId)"
          >{{ buttonValue }}</el-button
        >
      </div>
    </div>
  </div>
</template>

<script>
import { plan, dbPlans, deletePlans, addPlans } from "../../../network/action";
export default {
  name: "DetailInfo",
  data() {
    return {
      buttonValue: "加入训练计划",
      planData: []
    };
  },
  created() {
    plan().then(res => {
      for (let item of res.data) {
        if (item.planId == window.location.href.split("=")[1]) {
          this.planData.push(item);
        }
      }
      dbPlans({
        planId: this.planData[0].planId
      }).then(res => {
        // console.log(res);
        console.log(this.planData);
        if (res.code == 1) {
          for (let item of res.data) {
            if (item.userId == localStorage.getItem("userId")) {
              this.buttonValue = "取消训练计划";
            }
          }
        } else {
          this.buttonValue = "加入训练计划";
        }
      });
    });
  },
  methods: {
    open(planId) {
      if (localStorage.getItem("token")) {
        if (this.buttonValue == "取消训练计划") {
          this.buttonValue = "加入训练计划";
          this.$alert("已取消计划！", "", {
            confirmButtonText: "确定"
          });
          deletePlans({ planId }).then(res => {
            console.log(res);
          });
        } else {
          this.buttonValue = "取消训练计划";
          this.$alert("已加入计划！", "", {
            confirmButtonText: "确定"
          });
          addPlans({
            planId: planId,
            username: localStorage.getItem("userName"),
            userId: localStorage.getItem("userId"),
            name: this.planData[0].name,
            img: this.planData[0].img_url,
            plan_grade: this.planData[0].plan_grade,
            week: this.planData[0].week,
            day_everyweek: this.planData[0].day_everyweek,
            grade_type: this.planData[0].grade_type
          }).then(res => {
            console.log(res);
          });
        }
      } else {
        this.$alert("请宁先登录！", "", {
          confirmButtonText: "确定"
        });
      }
    }
  }
};
</script>

<style scoped>
.plan_first {
  overflow: hidden;
  border-bottom: solid 1px rgba(0, 0, 0, 0.07);
}

.plan_first_left {
  margin-top: 20px;
  margin-left: 20px;
  width: 600px;
  float: left;
}

.plan_first_right {
  height: 87.6px;
  width: 300px;
  line-height: 87.6px;
  float: right;
  margin-left: 30px;
}

.plan_first_left p {
  font-size: 20px;
  margin-top: -3px;
  margin-bottom: 4px;
}

.plan_first_left span {
  font-size: 16px;
  margin-right: 60px;
}
</style>
