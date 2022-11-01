<template>
  <div class="plans">
    <div class="pl_title">
      <h3>训练计划</h3>
      <!--      <router-link href="../html页面/traningpro.html">更多+</router-link>-->
      <router-link :to="index_plan_link_more.index_plan_link_more"
        >更多+</router-link
      >
    </div>
    <div id="plans_plan" class="plans_plan">
      <router-link
        class="plan_a"
        :id="plan_a.id"
        :to="plandetail"
        v-for="plan_a in plan_link"
      >
        <div class="plan" @click="click_plan(plan_a.id)">
          <div class="left">
            <img :src="plan_a.picture" alt="" width="130" height="90" />
          </div>
          <div class="right">
            <div class="plan_title">
              <h2 class="plan_title_h">{{ plan_a.name }}</h2>
            </div>
            <div class="center">
              <div class="week">
                <div class="hour">课时：{{ plan_a.week }}周</div>
                <div class="week_days">天/周：{{ plan_a.day_everyweek }}天</div>
              </div>
            </div>
            <div class="frequency">
              强度：

              <img
                v-for="i in plan_a.grade_level"
                src="../../img/满水滴.png"
                height="15"
                width="20"
              />
              <img
                v-for="i in plan_a.no_grade_level"
                src="../../img/水滴.png"
                height="15"
                width="20"
              />
            </div>
          </div>
        </div>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "index_center_plan",
  data() {
    return {
      index_plan_link_more: {
        index_plan_link_more: "/plan"
      },
      plandetail: "/plandetail",
      plan_link: [
        // {
        //   "id":"1",
        //   "img_src":"https://w2.dwstatic.com/yy/ojiastoreimage/1471856317913_am__len3052268.png?imageview/0/w/256/h/180/format/jpg/format/webp",
        //   "plan_title":"11",
        //   "week":"5",
        //   "week_day":"6",
        //   "frequency":1,
        //   "no_frequency":4,
        //   "frequency_img2":require("../../img/水滴.png"),
        //   "frequency_img1":require("../../img/满水滴.png"),
        // },
        // {
        //   "id":"2",
        //   "img_src":"https://w2.dwstatic.com/yy/ojiastoreimage/1471935150298_am__len105725.jpg?imageview/0/w/256/h/180/format/jpg/format/webp",
        //   "plan_title":"11",
        //   "week":"5",
        //   "week_day":"6",
        //   "frequency":2,
        //   "no_frequency":3,
        //   "frequency_img2":require("../../img/水滴.png"),
        //   "frequency_img1":require("../../img/满水滴.png"),
        // },
        // {
        //   "id":"3",
        //   "img_src":"https://w2.dwstatic.com/yy/ojiastoreimage/1467099252804_am__len233777.jpg?imageview/0/w/256/h/180/format/jpg/format/webp",
        //   "plan_title":"11",
        //   "week":"5",
        //   "week_day":"6",
        //   "frequency":3,
        //   "no_frequency":2,
        //   "frequency_img2":require("../../img/水滴.png"),
        //   "frequency_img1":require("../../img/满水滴.png"),
        // },
        // {
        //   "id":"4",
        //   "img_src":"https://w2.dwstatic.com/yy/ojiastoreimage/b9b66bb36a7f9b36a2856356118e0f27.jpg?imageview/0/w/128/h/70/format/jpg/format/webp",
        //   "plan_title":"11",
        //   "week":"5",
        //   "week_day":"6",
        //   "frequency":4,
        //   "no_frequency":1,
        //   "frequency_img2":require("../../img/水滴.png"),
        //   "frequency_img1":require("../../img/满水滴.png"),
        // },
        // {
        //   "id":"5",
        //   "img_src":"https://w2.dwstatic.com/yy/ojiastoreimage/1aa7b631f0a56cb75042ef547c0d7b05.jpg?imageview/0/w/128/h/70/format/jpg/format/webp",
        //   "plan_title":"11",
        //   "week":"5",
        //   "week_day":"6",
        //   "frequency":5,
        //   "no_frequency":0,
        //   "frequency_img2":require("../../img/水滴.png"),
        //   "frequency_img1":require("../../img/满水滴.png"),
        // },
        // {
        //   "id":"6",
        //   "img_src":"https://w2.dwstatic.com/yy/ojiastoreimage/539c4394a72ecc5b194a276a23eec413.jpg?imageview/0/w/128/h/70/format/jpg/format/webp",
        //   "plan_title":"11",
        //   "week":"5",
        //   "week_day":"6",
        //   "frequency":5,
        //   "no_frequency":0,
        //   "frequency_img2":require("../../img/水滴.png"),
        //   "frequency_img1":require("../../img/满水滴.png"),
        // },
      ],
      grade_num: 0,
      no_grade_num: 5
    };
  },
  created() {
    // var this_ = this;
    // this.$axios
    //   .get("http://127.0.0.1:8080/homepage/plan")
    //   .then(function(response) {
    //     // console.log(response.data);
    //     this_.plan_link = response.data;
    //   });
  },

  methods: {
    click_plan: function(id) {
      this.$store.state.click_index_planid = id;
      console.log(id);
    }
  }
};
</script>
<style scoped>
.plans {
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
  margin-top: 20px;
  width: 1180px;
  /*background: #c1e7ec;*/
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.plans .pl_title {
  width: 1180px;
  height: 50px;
  /*background: #c1e7ec;*/
  text-align: center;
  /*border-top:#919191 solid 1px ;*/
  /*border-bottom:#919191 solid 1px ;*/
  margin-top: 15px;
  margin-bottom: 10px;
}

.plans .pl_title h3 {
  display: block;
  /*width: 500px;*/
  /*height: 24px;*/
  /*background: #872fec;*/
  float: left;
  margin-left: 55px;

  /*border-left:#ff6164 solid 2px ;*/
  font-size: 24px;
  line-height: 50px;
}

.plans .pl_title a {
  /*width: 500px;*/
  /*height: 50px;*/
  /*background: #ec8460;*/
  float: right;
  margin-right: 25px;
  color: #919191;
  text-decoration: none;
  line-height: 50px;
}
.plans .plans_plan {
  width: 1180px;
  /*background: red;*/
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}
.plans .plan {
  width: 370px;
  height: 90px;
  /*background: #b6212d;*/
  margin-top: 8px;
  margin-bottom: 10px;
  /*解决抖动*/
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.plans .plan:hover {
  box-shadow: 0px 0px 10px gray;
  transform: translate(0px, -5px);
}

.plans .plan .left {
  height: 90px;
  width: 130px;
  /*background: #ff3b2f;*/
  float: left;
}

.plans .plan .right {
  height: 90px;
  width: 240px;
  /*background: #ffca22;*/
  float: right;
}

.plans .plan .right .plan_title h2 {
  font-size: 14px;
  color: #919191;
}

.plans .plan .right .center {
  margin-top: 5px;
  width: 240px;
  /*background: #5fff4a;*/
  font-size: 12px;
  color: #919191;
  padding-top: 10px;
}

.plans .plan .right .center .hour {
  width: 120px;
  /*background: #c1e7ec;*/
  float: left;
}

.plans .plan .right .center .week_days {
  width: 120px;
  /*background: #c1e7ec;*/
  float: left;
}

.plans .plan .right .frequency {
  font-size: 14px;
  margin-top: 30px;
  width: 240px;
  color: #919191;
}
</style>
