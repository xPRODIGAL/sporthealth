<template>
  <div class="center">
    <div class="center_two">
      <div class="tools_title">
        <div class="title"></div>
        <h2>身体质量指数(BMI)</h2>
      </div>
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;BMI[Body Mass Index]
        即BMI指数，也叫身体质量指数，是衡量是否肥胖和标准体重的重要指标。适用范围:18至65岁的人士。儿童、发育中的青少年、孕妇、乳母、老人及身型健硕的运动员除外。世界卫生组织认为BMI指数保持在22左右是比较理想的。
      </p>
      <div class="input_p"><strong>请输入您的身高、体重:</strong></div>
      <div class="footer">
        <div class="height">
          身高：
          <input type="text" ref="height" v-model="text_height" />
          CM（厘米）
        </div>
        <div class="weight">
          体重：
          <input type="" ref="weight" v-model="text_weight" />
          KG（公斤）
        </div>
        <div class="count">
          <input type="button" value="计算" @click="click_bmi" />
        </div>
        <div class="result" v-show="resultVisible">
          <p>• 您的身体质量指数(BMI)为&nbsp;&nbsp;{{ this.result }}</p>
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
      text_height: "",
      text_weight: "",
      result: ""
    };
  },
  beforeDestroy() {
    this.$store.state.tooldetail = "";
  },
  methods: {
    open1() {
      this.$message({
        showClose: true,
        message: "身高不能为空，请您请输入身高!",
        type: "error"
      });
    },
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
    click_bmi: function() {
      console.log(typeof this.text_height);
      console.log(typeof this.text_weight);

      if (this.text_height && this.text_weight) {
        this.resultVisible = true;
        this.result = this.keep_decimal(
          this.text_weight /
            ((this.text_height / 100) * (this.text_height / 100))
        );
      } else {
        if (!this.text_height) {
          this.open1();
          this.$refs.height.focus();
        } else {
          this.open2();
          this.$refs.weight.focus();
        }
      }
    }
  }
};
</script>

<style scoped>
.center {
  width: 1180px;
  height: 490px;

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
