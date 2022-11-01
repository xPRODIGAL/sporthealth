<template>
  <div class="center">
    <div class="tools_title">
      <div class="title"></div>
      <h2>实用工具集</h2>
    </div>
    <div class="tools">
      <ul>
        <li v-for="tool in tools" @click="click_tool(tool.title)">
          <router-link :to="tool.to">
            <div class="tool_img">
              <img :src="tool.imgSrc" alt="" width="100%" height="100%" />
            </div>
            <div class="right">
              <h3>{{ tool.title }}</h3>
              <p>{{ tool.jieshao }}</p>
            </div>
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "toolscenter",
  data() {
    return {
      tools: [
        {
          title: "一分钟了解自已",
          jieshao:
            "1分钟彻底了解自己的标准体重、健康体重范围、BMI指数（即身体质量指数）、基础代谢率和燃脂运动中低强度运动心率，看看自己是否需要减肥了。身体质量指数(BMI)：评估体重与身高比例的常用工具，适用范围：18至65岁的人士。儿童、发育中的青少年、孕妇、乳母、老人及身型健硕的运动员除外。",
          imgSrc: require("../../img/计算工具1.png"),
          to: "/tools/tooldetailone"
        },
        {
          title: "身体质量指数(BMI)",
          jieshao:
            "BMI[Body Mass Index] 即BMI指数，也叫身体质量指数，是衡量是否肥胖和标准体重的重要指标。适用范围：18至65岁的人士。儿童、发育中的青少年、孕妇、乳母、老人及身型健硕的运动员除外。世界卫生组织认为BMI指数保持在22左右是比较理想的。",
          imgSrc: require("../../img/计算工具2.png"),
          to: "/tools/tooldetailtwo"
        },
        {
          title: "标准体重计算",
          jieshao:
            "您的体重符合标准吗？使用标准体重计算器，请在下面选择您的性别，输入身高，最后计算得出标准体重。计算适用范围：\n" +
            "                                    女性：19岁到69岁，身高在152cm到176cm。\n" +
            "                                    男性：19岁到69岁，身高在152cm到188cm。",
          imgSrc: require("../../img/计算工具3.png"),
          to: "/tools/tooldetailthree"
        },
        {
          title: "基础代谢计算",
          jieshao:
            "基础代谢率（BMR）是指人体在清醒而又极端安静的状态下，不受肌肉活动、环境温度、食物及精神紧张等影响时的能量代谢率。\n" +
            "    基础代谢率对减肥有非常大的影响，每天适量的运动有助于提高身体的基础代谢率，而节食(极端是绝食)会降低人的基础代谢率。通过性别，年龄，身高和体重能粗略计算基础代谢率。",
          imgSrc: require("../../img/计算工具4.png"),
          to: "/tools/tooldetailfour"
        },
        {
          title: "最大围度计算",
          jieshao:
            " 下列计算器可按你的体型计算出不用药优秀运动员的身体最大围度（大概8%-10%的体脂率）。方程是基于我六年对于过去和现在非用药冠军的研究和数据分析所得出的。本质上，这个计算器是将非用药冠军的体型去拟合你的体型。同时也包括了大量真实不用药健美冠军的数据。被这个计算器所使用的方程可在《不用药最大围度》这本书中里找到。",
          imgSrc: require("../../img/计算工具5.png"),
          to: "/tools/tooldetailfive"
        },
        {
          title: "补水计算",
          jieshao:
            "运动健身网 - 喝多少水和体重也有关，和是否活动有关。此计算器可以根据你的体重，计算出每天你的最佳喝水量",
          imgSrc: require("../../img/计算工具6.png"),
          to: "/tools/tooldetailsix"
        }
      ]
    };
  },
  methods: {
    click_tool: function(title) {
      this.$store.state.tooldetail = title;
    }
  }
};
</script>

<style scoped>
.center {
  width: 100%;
  height: 100%;
}
.center .tools_title {
  height: 100%;
  width: 1180px;
  margin: auto;
  /*background: #c5ed6b;*/
  margin-top: 50px;
}
.title {
  height: 30px;
  width: 6px;
  background: #ed3a4a;
  float: left;
  /*margin-top: px;*/
  margin-right: 8px;
}
.tools {
  width: 1180px;
  margin: auto;
}
.tools ul {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.tools ul li {
  list-style: none;
  width: 540px;
  height: 119px;
  border-bottom: 1px gray dashed;
  margin: 20px auto;
}
.tools ul li a {
  text-decoration: none;
}
.tool_img {
  margin: 10px auto;
  border-radius: 15px;
  background: #ed3a4a;
  height: 110px;
  width: 110px;
  overflow: hidden;
  float: left;
}
.right {
  height: 119px;
  width: 400px;
  float: right;
}
.right h3 {
  margin: 10px;
  color: black;
}
.right p {
  height: 60px;
  width: 394px;
  margin: 12px 0px;
  /*background: #ed3a4a;*/
  display: block;
  overflow: hidden;
  color: black;
}
</style>
