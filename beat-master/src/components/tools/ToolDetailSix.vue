<template>
  <div class="center">
    <div class="center_two">
      <div class="tools_title">
        <div class="title"></div>
        <h2>补水计算器</h2>
      </div>
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;运动健身网 -
        喝多少水和体重也有关，和是否活动有关。此计算器可以根据你的体重，计算出每天你的最佳喝水量
      </p>
      <div class="input_p"><strong>请输入您的体重:</strong></div>
      <div class="footer">
        <div class="weight">
          体重：
          <input type="" ref="weight" v-model="text_weight" />
          KG（公斤）
        </div>
        <div class="count">
          <input type="button" value="计算" @click="click_wat" />
        </div>
        <div class="result" v-show="resultVisible">
          <p>
            • 每日饮水为&nbsp;&nbsp;{{ this.result }}
            CC（毫升）
          </p>
<p>• 每日饮水时间推荐表：
          <table border="1px">
            
            <tr>
              <th>时间</th>
              <th>备注</th>
            </tr>

            <tr>
              <td>AM6:30</td>
              <td>
                经过一整夜的睡眠，身体开始缺水，起床之际先喝杯<span
                  >({{ this.result1 }}CC)</span
                >的水，可帮助肾脏及肝脏解毒。别马上吃早餐，等待半小时让水融入每个细胞，进行新陈代谢后，再进食！（非常重要！身体排污靠它！）
              </td>
            </tr>
            <tr>
              <td>AM8:30</td>
              <td>
                清晨从起床到办公室的过程，时间总是特别紧凑，情绪也较紧张，身体无形中会出现脱水现象，所以到了办公室后，先别急着泡咖啡，给自己一杯至少<span
                  >({{ this.result2 }}CC)</span
                >的水！
              </td>
            </tr>
            <tr>
              <td>AM11:00</td>
              <td>
                在办公室里工作一段时间后，一定得趁起身动动的时候，再给自己一天里的第三杯水<span
                  >({{ this.result3 }}CC)</span
                >，补充流失的水分，有助于放松紧张的工作情绪！
              </td>
            </tr>
            <tr>
              <td>PM12:50</td>
              <td>
                用完午餐半小时后，喝一些水<span>({{ this.result2 }}CC)</span
                >，取代让你发胖的人工饮料，可以加强身体的消化功能，不仅对健康有益，也能助你维持身材。
              </td>
            </tr>
            <tr>
              <td>PM3:00</td>
              <td>
                以一杯健康矿泉水代替午茶与咖啡等提神饮料吧！喝上一大杯<span
                  >({{ this.result4 }}CC)</span
                >的水，除了补充在办公室里流失的水份之外，还能帮助头脑清醒。
              </td>
            </tr>
            <tr>
              <td>PM5:30</td>
              <td>
                下班离开办公室前，再喝一杯水<span>({{ this.result5 }}CC)</span
                >。想要运用喝水减重的，可以多喝几杯，增加饱足感，待会吃晚餐时，自然不会暴饮暴食。
              </td>
            </tr>
            <tr>
              <td>PM10:00</td>
              <td>
                睡前一至半小时再喝上一杯水
                <span>({{ this.result6 }}CC)</span>
                ，目标达成！（不过别一口气喝太多，以免晚上得上洗手间影响睡眠品质。^_^）
              </td>
            </tr>
          </table>
</p>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "tooldetail",
  data() {
    return {
      radio: "1",
      footvisible: false,
      handvisible: false,
      resultVisible: false,
      text_weight: "",
      result: ""
    };
  },
  beforeDestroy() {
    this.$store.state.tooldetail = "";
  },
  methods: {
    open2() {
      this.$message({
        showClose: true,
        message: "体重不能为空，请您请输入体重!",
        type: "error"
      });
    },
    //保留一位小数
    keep_decimal: function(val) {
      val = Math.round(val * 10) / 10;
      var xsd = val.toString().split(".");
      if (xsd.length === 1) {
        val = val.toString() + ".0";
        return val;
      }
      return val;
    },
    click_wat: function() {
      console.log(typeof this.text_weight);
      if (this.text_weight) {
        this.resultVisible = true;
        this.result = this.text_weight * 33;
        this.result1 = this.keep_decimal((this.result * 15) / 100);
        this.result2 = this.keep_decimal((this.result * 136) / 1000);
        this.result3 = this.keep_decimal((this.result * 145) / 1000);
        this.result4 = this.keep_decimal((this.result * 147) / 1000);
        this.result5 = this.keep_decimal((this.result * 146) / 1000);
        this.result6 = this.keep_decimal((this.result * 139) / 1000);
      } else {
        this.open2();
        this.$refs.weight.focus();
      }
    }
  }
};
</script>

<style scoped>
table span {
  color: red;
}

.center {
  width: 1180px;
  height: 720px;

  margin: auto;
  /*background: #85ed8b;*/
  padding-top: 20px;
  border: gray 0.5px solid;
}
.center .center_two {
  width: 1100px;
  height: 351px;
  margin: auto;
  /*background: #ed3a4a;*/
}
.center .center_two .tools_title {
  height: 30px;
  width: 1100px;
  margin: auto;
  /*background: #c5ed6b;*/
}
.center .center_two .tools_title .title {
  height: 30px;
  width: 6px;
  background: #ed3a4a;
  float: left;
  /*margin-top: px;*/
  margin-right: 8px;
}
.center .center_two p {
  width: 1080px;
  margin-top: 20px;
  padding: 20px 10px;
  background: #f4f4f4;
  border-radius: 10px;
}
.input_p {
  margin: 20px 0px;
  font-size: 16px;
}

.height,
.weight {
  display: flex;
  margin: 20px 0px;
}

.height input {
  width: 120px;
  height: 20px;
  margin: 0px 5px;
}
.weight input {
  width: 120px;
  height: 20px;
  margin: 0px 5px;
}
.count {
  margin-top: 40px;
  margin-left: 55px;
}
.count input {
  width: 120px;
  height: 45px;
  font-size: 16px;
  border-radius: 5px;
  border: NONE;
  /*outline: none ;*/
  /*background: #DC5454;*/
  /*color: white;*/
}
</style>
