<template>
  <div class="center">
    <div class="center_two">
      <div class="tools_title">
        <div class="title"></div>
        <h2>一分钟了解自已</h2>
      </div>
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;1分钟彻底了解自己的标准体重、健康体重范围、BMI指数（即身体质量指数）、
        基础代谢率和燃脂运动中低强度运动心率，看看自己是否需要减肥了。身体质量指数(BMI)：
        评估体重与身高比例的常用工具，适用范围：18至65岁的人士。
        儿童、发育中的青少年、孕妇、乳母、老人及身型健硕的运动员除外。
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
          <input type="button" value="计算" @click="click_all" />
        </div>
        <div class="result" v-show="resultVisible">
          <p>• 您的身体质量指数(BMI)为:&nbsp;&nbsp;{{ this.result }}</p>

          <p>
            • 成年人身体质量指数：
            <el-table :data="tableBmi" style="width: 100%">
              <el-table-column prop="light_bmi" label="轻体重BMI" width="250px">
              </el-table-column>
              <el-table-column
                prop="health_bmi"
                label="健康体重BMI"
                width="250px"
              >
              </el-table-column>
              <el-table-column prop="weight_bmi" label="超重BMI" width="250px">
              </el-table-column>
              <el-table-column prop="fat_bmi" label="肥胖BMI" width="250px">
              </el-table-column>
            </el-table>
          </p>
          <p>
            • 您的年龄身高对应标准体重为&nbsp;&nbsp;{{
              this.result1
            }}
            KG（1KG=2斤）<br />
          </p>
          <p>
            <span>人体要燃烧脂肪，需要满足三个必要条件：</span>
            <br />
            1、该运动要达到中低强度的运动心率；<br />
            2、这种中低强度运动心率的运动要持续20分钟以上；<br />
            3、这种运动必须是大肌肉群的运动，如慢跑、游泳、健身操等。<br />
            低于或高于这个范围，都不算中低强度运动心率，燃烧的也就不是脂肪了~
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
      radioVal: "1",
      // getRadioVal: "",
      footvisible: false,
      handvisible: false,
      resultVisible: false,
      text_age: "",
      text_height: "",
      text_weight: "",
      result: "",
      result1: "",
      tableBmi: [
        {
          light_bmi: "BMI < 18.5",
          health_bmi: "18.5 < BMI < 24",
          weight_bmi: "24 < BMI < 28",
          fat_bmi: "28  < BMI"
        }
      ]
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
    click_all: function() {
      if (
        this.text_height &&
        this.text_weight &&
        this.radioVal == 1 &&
        this.text_age
      ) {
        this.resultVisible = true;
        this.result = this.keep_decimal(
          this.text_weight /
            ((this.text_height / 100) * (this.text_height / 100))
        );
        this.result1 = this.keep_decimal(((this.text_height - 80) * 70) / 100);
      } else if (
        this.text_height &&
        this.text_weight &&
        this.radioVal == 2 &&
        this.text_age
      ) {
        this.resultVisible = true;
        this.result = this.keep_decimal(
          this.text_weight /
            ((this.text_height / 100) * (this.text_height / 100))
        );
        this.result1 = this.keep_decimal(((this.text_height - 70) * 60) / 100);
      } else {
        if (!this.text_age) {
          this.open3();
          this.$refs.age.focus();
        } else if (!this.text_height) {
          this.open1();
          this.$refs.text_height.focus();
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
  height: 900px;

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
.result span {
  color: red;
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
