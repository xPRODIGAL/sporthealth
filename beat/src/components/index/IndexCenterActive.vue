<template>
  <div class="actions">
    <div class="ac_title">
      <h3>健身动作</h3>
      <router-link :to="index_active_link_more.index_active_link_more"
        >更多+</router-link
      >
    </div>
    <div class="ac_div">
      <div class="top" id="gerenjihua" @click="dialogVisible = true">
        <lunbo></lunbo>
        <!--        <router-link to="" ><img  src="../../img/个人计划.png" width="1180"/></router-link>-->
      </div>
      <div class="bottom">
        <div class="action">
          <div class="action_a" id="action_a">
            <router-link
              :to="index_active_link_more.index_active_link_more"
              :id="part.id"
              v-for="part in parts"
            >
              <img
                class="action_a_href"
                :src="part.body_picture"
                alt=""
                width="180"
                height="93"
                @click="click_part(part.part_name)"
              />
              <h2 class="action_a_href" @click="click_part(part.part_name)">
                {{ part.part_name }}
              </h2>
            </router-link>
          </div>
        </div>
        <div class="instrument">
          <div class="instrument_a" id="instrument_a">
            <router-link
              :to="index_active_link_more.index_active_link_more"
              :id="instrument.id"
              v-for="instrument in instruments"
              @click="click_instrument(instrument.name)"
            >
              <img
                class="instrument_a_href"
                :src="instrument.qixie_picture"
                alt=""
                width="180"
                height="93"
                @click="click_instrument(instrument.id)"
              />
              <h2
                class="instrument_a_href"
                @click="click_instrument(instrument.name)"
              >
                {{ instrument.name }}
              </h2>
            </router-link>
          </div>
        </div>
      </div>
    </div>

    <el-dialog title="" :visible.sync="dialogVisible" width="30%">
      <!--      :before-close="handleClose">-->
      <el-steps :active="active" finish-status="success">
        <!--        //步骤 2-->
        <el-step title=""></el-step>
        <el-step title=""></el-step>
        <el-step title=""></el-step>
        <el-step title=""></el-step>
      </el-steps>
      <div class="modal_text_aim" v-if="aims[active]">
        <div :class="aims[active].div_class_one">
          <span>{{ aims[active].text_title }}</span>
        </div>
        <div
          :class="aims[active].div_class_two"
          :id="aims[active].div_class_two"
        >
          <button
            v-for="(btn, index) in aims[active].button"
            @click="click_btns(index)"
            :class="{ btnColor: click_btn[active] == btn.index }"
            :id="btn.id"
          >
            {{ btn.name }}
          </button>
        </div>
      </div>
      <div v-if="active == 4" class="push_plan">
        <div class="text_result"><span>您的训练计划是</span></div>
        <div class="plan" v-if="isplan" :id="model_plan.id">
          <router-link to="">
            <div class="choose_result" id="choose_result">
              <div class="left">
                <img :src="model_plan.picture" alt="" width="130" height="90" />
              </div>
              <div class="right">
                <div class="plan_title">
                  <h2 class="plan_title_h">{{ model_plan.name }}</h2>
                </div>
                <div class="center">
                  <div class="week">
                    <div class="hour">课时：{{ model_plan.week }}周</div>
                    <div class="week_days">
                      天/周：{{ model_plan.day_everyweek }}天
                    </div>
                  </div>
                </div>
                <div class="frequency">
                  强度：

                  <img
                    v-for="i in model_plan.grade_level"
                    src="../../img/满水滴.png"
                    height="15"
                    width="20"
                  />
                  <img
                    v-for="i in model_plan.no_grade_level"
                    src="../../img/水滴.png"
                    height="15"
                    width="20"
                  />
                </div>
              </div>
            </div>
          </router-link>
        </div>
        <div class="none_plan" v-else>
          <span>*暂无相关计划</span>
        </div>
      </div>

      <div class="foot">
        <el-button
          class="back"
          style="margin-top: 12px;"
          @click="back"
          :disabled="!backVisible"
          >上一步</el-button
        >
        <el-button
          class="add_plan"
          style="margin-top: 12px;"
          @click="add_plan"
          :disabled="!addplanVisible"
          v-if="active == 4"
          >添加计划</el-button
        >

        <el-button
          class="next"
          style="margin-top: 12px;"
          @click="next"
          :disabled="!nextVisible"
          >下一步</el-button
        >
      </div>
    </el-dialog>
  </div>
</template>

<script>
import Lunbo from "./Lunbo";

export default {
  name: "index_center_active",
  data() {
    return {
      index_active_link_more: {
        index_active_link_more: "/action"
      },
      plan_a: {},
      dialogVisible: false,

      backVisible: false,
      nextVisible: true,
      active: 0, //定义是那一页
      click_btn: [0, 0, 0, 0], //点击按钮变色变量
      button: 0,
      parts: [],
      instruments: [],
      model_plan: {}, //用来存放后台取到的计划
      isplan: false, //用来判断是否取到了计划，来显示内容
      addplanVisible: false, //用来判断是否取到了计划，来设置按钮是否可以点击
      aims: [
        {
          div_class_one: "text_aim",
          text_title: "训练目标",
          div_class_two: "choose_aim",
          button_class: "aim",
          button: [
            { id: "jianzhi", name: "减脂", index: 0 },
            { id: "suxing", name: "塑形", index: 1 },
            { id: "zengji", name: "增肌", index: 2 }
          ]
        },
        {
          div_class_one: "text_instrument",
          text_title: "器械要求",
          div_class_two: "choose_instrument",
          button_class: "instrument",
          button: [
            { id: "unarmed", name: "徒手", index: 0 },
            { id: "dumbbell", name: "哑铃", index: 1 },
            { id: "gym", name: "仰卧板", index: 2 }
          ]
        },
        {
          div_class_one: "text_part",
          text_title: "训练部位",
          div_class_two: "choose_part",
          button_class: "part",
          button: [
            { id: "chest", name: "胸肌", index: 0 },
            { id: "back", name: "肱二头肌", index: 1 },
            { id: "shoulders", name: "肩部", index: 2 },
            { id: "abdomen", name: "背阔肌", index: 3 },
            { id: "haunch", name: "腹肌", index: 4 },
            { id: "leg", name: "小腿肌群", index: 5 }
          ]
        },
        {
          div_class_one: "text_grade",
          text_title: "训练强度",
          div_class_two: "choose_grade",
          button_class: "grade",
          button: [
            { id: "H1", name: "B1", index: 0 },
            { id: "H2", name: "B2", index: 1 },
            { id: "H3", name: "B3", index: 2 },
            { id: "H4", name: "B4", index: 3 },
            { id: "H5", name: "B5", index: 4 }
          ]
        }
      ]
    };
  },
  components: {
    lunbo: Lunbo
  },
  methods: {
    handleClose(done) {
      this.$confirm("确定放弃制定个人计划？")
        .then(_ => {
          done();
        })
        .catch(_ => {});
    },
    open2() {
      this.$message({
        showClose: true,
        message: "添加计划失败！您未登录，请先登录！",
        type: "error"
      });
    },
    open3() {
      this.$message({
        showClose: true,
        message: "添加失败，此计划已经添加！",
        type: "error"
      });
    },
    open4() {
      this.$message({
        showClose: true,
        message: "添加计划成功！"
      });
    },
    //  定义方法改变按钮背景颜色
    click_btns: function(index) {
      var j = this.active;
      this.click_btn.splice(j, 1, index);
    },
    next() {},
    back() {
      this.active--;
      if (this.active <= 0) {
        this.backVisible = false;
      } else {
        if (this.active > 3) {
          this.nextVisible = false;
        } else {
          this.nextVisible = true;
        }
      }
    },
    //点击获取按钮名称
    click_instrument: function(name) {
      this.$store.state.apparatus_type = name;
    },
    click_part: function(name) {
      this.$store.state.bodypart_type = name;
      console.log(name);
    },

    //点击添加计划按钮
    add_plan() {}
  },
  created() {}
};
</script>

<style scoped>
.modal_text_aim .btnColor {
  background: red;
}

/*走马灯*/
.el-carousel__item h3 {
  color: #475669;
  font-size: 18px;
  opacity: 0.75;
  line-height: 300px;
  margin: 0;
}

.el-carousel__item:nth-child(2n) {
  background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n + 1) {
  background-color: #d3dce6;
}
/*模态框*/
.modal_text_aim {
  height: 200px;
  width: 410.75px;
  /*background: #888888;*/
  border: solid rgba(128, 128, 128, 0.4) 1px;
  margin-top: 30px;
}
.foot {
  height: 70px;
  width: 410.75px;
  /*background: #ed3a4a;*/
  border-bottom: solid rgba(128, 128, 128, 0.4) 1px;
  border-left: solid rgba(128, 128, 128, 0.4) 1px;
  border-right: solid rgba(128, 128, 128, 0.4) 1px;
}
.foot .add_plan {
  position: relative;
  left: 170px;
}
.back {
  margin-left: 30px;
  float: left;
}
.next {
  margin-right: 30px;
  float: right;
}
.text_aim,
.text_grade,
.text_instrument,
.text_part {
  height: 40px;
  width: 410.75px;
  text-align: center;
  font-size: 26px;
  color: #ff2523;
  margin-top: 10px;
  /*background: #ed3a4a;*/
  border-bottom: solid rgba(128, 128, 128, 0.4) 1px;
}
.choose_aim,
.choose_instrument,
.choose_part,
.choose_grade {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  border: none;
}

/*选择按钮*/
.modal_text_aim button {
  width: 90px;
  height: 40px;
  margin: 15px;
  border-radius: 4px;
  outline: none;
  border: none;
  background: #f4f4f5;
  cursor: pointer;
}
.modal_text_aim button:hover {
  background: rgba(255, 37, 35, 0.6);
  color: white;
}

.actions {
  width: 1180px;
  margin: auto;
}

.actions .ac_title {
  width: 1180px;
  height: 50px;
  /*background: #c1e7ec;*/
  text-align: center;
  /*border-top:#919191 solid 1px ;*/
  /*border-bottom:#919191 solid 1px ;*/
  margin-top: 25px;
  margin-bottom: 20px;
}

.actions .ac_title h3 {
  float: left;
  margin-left: 55px;
  font-size: 24px;
  line-height: 50px;
}

.actions .ac_title a {
  float: right;
  margin-right: 25px;
  color: #919191;
  text-decoration: none;
  line-height: 50px;
}

.actions .ac_div {
  width: 1180px;
  /*background: #dd241d;*/
  margin-top: 10px;
}

.actions .ac_div .bottom {
  width: 1180px;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.actions .ac_div .bottom .action {
  width: 580px;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  margin-top: 10px;
}

.actions .ac_div .bottom .action .action_a {
  width: 580px;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.actions .ac_div .bottom .action .action_a a {
  text-decoration: none;
  color: whitesmoke;
  text-align: center;
  height: 93px;
  margin: 10px auto;
  cursor: pointer;
  transition: all 0.6s;
}

.actions .ac_div .bottom .action .action_a a:hover {
  box-shadow: 0px 0px 10px gray;
  transform: scale(1.1);
}
.actions .ac_div .bottom .action .action_a a h2 {
  position: relative;
  bottom: 70px;
  color: rgba(254, 0, 0, 0.86);
}

/************器械********/
.actions .ac_div .bottom .instrument {
  width: 580px;
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  margin-top: 10px;
}

.actions .ac_div .bottom .instrument .instrument_a {
  width: 580px;
  /*color: red;*/
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.actions .ac_div .bottom .instrument .instrument_a a {
  text-decoration: none;
  color: whitesmoke;
  text-align: center;
  height: 93px;
  margin: 10px auto;
  cursor: pointer;
  transition: all 0.6s;
}

.actions .ac_div .bottom .instrument .instrument_a a:hover {
  box-shadow: 0px 0px 10px gray;
  transform: scale(1.1);
}
.actions .ac_div .bottom .instrument .instrument_a a h2 {
  position: relative;
  bottom: 70px;
  color: rgba(254, 0, 0, 0.86);
}

.actions .ac_div .bottom .classify {
  margin-bottom: 10px;
  margin-top: 10px;
}

/*推送计划样式*/
.push_plan {
  width: 410.75px;
  height: 181px;

  font-size: 26px;
  margin-top: 30px;
  border: 1px solid rgba(128, 128, 128, 0.4);
}
.text_result {
  margin-top: 10px;
  border-bottom: 1px solid rgba(128, 128, 128, 0.4);
  color: #ff2523;
  text-align: center;
}
.plan {
  width: 380px;
  height: 90px;
  /*background: #b6212d;*/
  margin: auto;
  margin-top: 15px;
}

.plan .left {
  height: 90px;
  width: 130px;
  /*background: #ff3b2f;*/
  float: left;
}

.plan .right {
  height: 90px;
  width: 240px;
  /*background: #ffca22;*/
  float: right;
}

.plan .right .plan_title h2 {
  font-size: 14px;
  color: #919191;
}

.plan .right .center {
  margin-top: 5px;
  width: 240px;
  /*background: #5fff4a;*/
  font-size: 12px;
  color: #919191;
  padding-top: 10px;
}

.plan .right .center .hour {
  width: 120px;
  /*background: #c1e7ec;*/
  float: left;
}

.plan .right .center .week_days {
  width: 120px;
  /*background: #c1e7ec;*/
  float: left;
}

.plan .right .frequency {
  font-size: 14px;
  margin-top: 30px;
  width: 240px;
  color: #919191;
}

/*  无推送计划*/
.none_plan {
  text-align: center;
  width: 410.75px;
  /*height: 181px;*/

  margin-top: 30px;
  /*border: 1px solid rgba(128, 128, 128, 0.4);*/
}
</style>
