<template>
  <div class="center">
    <div class="center_two">
      <div class="tools_title">
        <div class="title"></div>
        <h2>基础代谢</h2>
      </div>
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;基础代谢率（BMR）是指人体在清醒而又极端安静的状态下，不受肌肉活动、环境温度、食物及精神紧张等影响时的能量代谢率。
        <br />&nbsp;&nbsp;&nbsp;&nbsp;基础代谢率对减肥有非常大的影响，每天适量的运动有助于提高身体的基础代谢率，而节食(极端是绝食)会降低人的基础代谢率。通过性别，年龄，身高和体重能粗略计算基础代谢率。
      </p>
      <div class="input_p">
        <strong>请输入您的性别、年龄、身高和体重：</strong>
      </div>
      <div class="footer">
        性别:
        <label
          ><input
            v-model="radioVal"
            type="radio"
            value="1"
            @change="getRadioVal"
          />男</label
        >
        <label
          ><input
            v-model="radioVal"
            type="radio"
            value="2"
            @change="getRadioVal"
          />女</label
        >

        <div class="height">
          <span
            >年龄:
            <input type="" ref="age" v-model="text_age" />
            岁</span
          >
          <span
            >身高：
            <input type="" ref="height" v-model="text_height" />
            CM（厘米）</span
          ><span
            >体重：
            <input type="" ref="weight" v-model="text_weight" />
            KG（公斤）</span
          >
        </div>
        <div class="count">
          <input type="button" value="计算" @click="click_bmr" />
        </div>
        <div class="result" v-show="resultVisible">
          <p>
            • 您的基础代谢率为&nbsp;&nbsp;{{ this.result }}
            大卡
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
      radioVal: "1",
      footvisible: false,
      handvisible: false,
      resultVisible: false,
      text_age: "",
      text_height: "",
      text_weight: "",
      // param: "",
      result: ""
    };
  },
  beforeDestroy() {
    this.$store.state.tooldetail = "";
  },
  methods: {
    getRadioVal() {
      console.log(this.radioVal);
    },
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
    open3() {
      this.$message({
        showClose: true,
        message: "年龄不能为空，请您请输入体重!",
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
    click_bmr: function() {
      console.log(typeof this.text_height);
      console.log(typeof this.text_age);
      console.log(typeof this.text_weight);
      console.log(typeof this.radioVal);
      if (
        this.text_height &&
        this.radioVal == 1 &&
        this.text_weight &&
        this.text_age
      ) {
        this.resultVisible = true;
        this.result = this.keep_decimal(
          10 * this.text_weight +
            (625 / 100) * this.text_heigth -
            5 * this.text_age +
            5
        );
      } else if (
        this.text_height &&
        this.radioVal == 2 &&
        this.text_weight &&
        this.text_age
      ) {
        this.resultVisible = true;
        this.result = this.keep_decimal(
          10 * this.text_weight +
            6.25 * this.text_heigth -
            5 * this.text_age -
            161
        );
      } else {
        if (!this.text_height) {
          this.open1();
          this.$refs.height.focus();
        } else if (!this.text_weight) {
          this.open2();
          this.$refs.weight.focus();
        } else {
          this.open3();
          this.$refs.age.focus();
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

.boy {
  height: 30px;
  background: fff;
  border-bottom: 1px solid #f1ebeb;
}
.boy input {
  text-align: center;
}
.boy label {
  text-align: center;
}

.girl {
  height: 30px;
  background: fff;
}

.height {
  display: flex;
  margin: 20px 0px;
}

.height span {
  margin-right: 30px;
}

.height input {
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
