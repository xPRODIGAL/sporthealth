<template>
  <div class="counts">
    <div class="count_tools">
      <!-- 计算工具-->
      <div class="c_t_header">
        <div class="left">
          <img src="../../img/计算器3.png" alt="" width="50" height="40" />
          <h1>计算工具</h1>
        </div>
      </div>
      <div class="tools">
        <div
          v-for="img in imgs"
          class="count_tool"
          @click.stop="click_tool(img.title, img.to)"
        >
          <div class="tool_img">
            <img :src="img.imgSrc" alt="" width="100%" height="100%" />
          </div>
          <h3>{{ img.title }}</h3>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index_center_count",
  data() {
    return {
      imgs: [
        {
          id: 1,
          imgSrc: require("../../img/计算工具1.png"),
          title: "一分钟了解自已",
          to: "/tools/tooldetailone"
        },
        {
          id: 2,
          imgSrc: require("../../img/计算工具2.png"),
          title: "身体质量指数(BMI)",
          to: "/tools/tooldetailtwo"
        },
        {
          id: 3,
          imgSrc: require("../../img/计算工具3.png"),
          title: "标准体重计算",
          to: "/tools/tooldetailthree"
        },
        {
          id: 4,
          imgSrc: require("../../img/计算工具4.png"),
          title: "基础代谢计算",
          to: "/tools/tooldetailfour"
        },
        {
          id: 5,
          imgSrc: require("../../img/计算工具5.png"),
          title: "最大围度计算",
          to: "/tools/tooldetailfive"
        },
        {
          id: 6,
          imgSrc: require("../../img/计算工具6.png"),
          title: "补水计算器",
          to: "/tools/tooldetailsix"
        }
      ]
    };
  },
  methods: {
    click_tool: function(title, to) {
      this.$store.state.tooldetail = title;
      this.$router.push(to);
    }
  }
};
</script>
<style scoped>
.tools {
  margin-bottom: 20px;
}
.counts {
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
  width: 1519px;
  /*height: 600px;*/
  /*background: rgba(0, 255, 0, 0.2);*/
  /*background: url("../../img/count_bg1.jpg");*/
  background: #61cc74;
  /*background: white;*/
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  margin-top: 40px;
  /*background-color: rgba(0, 0, 0, 0.6);*/
}

.counts .count_tools {
  width: 1180px;
  color: white;
  /*background: #af40ff;*/
  /*margin-left: 170px;*/
}

.counts .count_tools .c_t_header {
  height: 80px;
  /*background: #ff712c;*/
  /*border-bottom: #919191 solid 2px;*/
  text-align: center;
}

.counts .count_tools .c_t_header .left {
  height: 50px;
  width: 300px;
  display: flex;
  margin: 15px 0px 0px 15px;
  float: left;
}

.counts .count_tools .c_t_header .left h1 {
  font-size: 30px;
}

.counts .count_tools .c_t_header .right {
  height: 50px;
  width: 160px;

  margin: 15px 0px 0px 15px;
  float: right;
  text-align: center;
  line-height: 50px;
  /*background: #ac0000;*/
}

.counts .count_tools .c_t_header .right a {
  text-decoration: none;
  font-size: 16px;
  /*color: #919191;*/
  /*color:black;*/
}

.counts .count_tools .tools {
  width: 1180px;
  /*background: #db4239;*/
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.counts .count_tools .tools a {
  margin: 10px auto;
  text-decoration: none;
  color: #fffcf6;
}

.counts .count_tools .tools .count_tool {
  width: 300px;
  height: 160px;
  /*color: white;*/
  /*background: #919191;*/
  text-align: center;
  margin: 20px auto;
  /*解决抖动*/
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.counts .count_tools .tools .count_tool .tool_img {
  margin: 10px auto;
  border-radius: 15px;
  background: #ed3a4a;
  height: 110px;
  width: 110px;
  overflow: hidden;
}
</style>
