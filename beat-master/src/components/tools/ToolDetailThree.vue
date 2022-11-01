<template>
  <div class="center">
    <div class="center_two">
      <div class="tools_title">
        <div class="title"></div>
        <h2>标准体重计算</h2>
      </div>
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;您的体重符合标准吗？使用标准体重计算器，请在下面选择您的性别，输入身高，最后计算得出标准体重。计算适用范围：
        <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;女性：19岁到69岁，身高在152cm到176cm。
        <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;男性：19岁到69岁，身高在152cm到188cm。
      </p>
      <div class="input_p"><strong>请输入您的性别、身高:</strong></div>
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
          身高：
          <input type="text" ref="height" v-model="text_height" />
          CM（厘米）
        </div>
        <div class="count">
          <input type="button" value="计算" @click="click_bt" />
        </div>
        <div class="result" v-show="resultVisible">
          <p>
            • 您的年龄身高对应标准体重为&nbsp;&nbsp;{{ this.result }}
            KG（1KG=2斤）
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
      // getRadioVal: "",
      footvisible: false,
      handvisible: false,
      resultVisible: false,
      text_height: "",
      param: "",
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
    click_bt: function() {
      console.log(this.text_height);
      console.log(this.radioVal);
      if (this.text_height && this.radioVal == 1) {
        this.resultVisible = true;
        this.result = this.keep_decimal(((this.text_height - 80) * 70) / 100);
      } else if (this.text_height && this.radioVal == 2) {
        this.resultVisible = true;
        this.result = this.keep_decimal(((this.text_height - 70) * 60) / 100);
      } else {
        this.open1();
        this.$refs.heigth.focus();
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
