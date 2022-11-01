<template>
  <div class="center">
    <div class="center_two">
      <div class="tools_title">
        <div class="title"></div>
        <h2>最大维度</h2>
      </div>
      <p>
        &nbsp;&nbsp;&nbsp;&nbsp;下列计算器可按你的体型计算出不用药优秀运动员的身体最大围度（大概8%-10%的体脂率）。方程是基于我六年对于过去和现在非用药冠军的研究和数据分析所得出的。本质上，这个计算器是将非用药冠军的体型去拟合你的体型。同时也包括了大量真实不用药健美冠军的数据。被这个计算器所使用的方程可在《不用药最大围度》这本书中里找到。
      </p>
      <div class="height">
        <span>身高：</span
        ><input type="text" ref="height" v-model="text_height" />CM（厘米）
      </div>
      <div class="hand">
        <span>手腕：</span>
        <el-popover placement="right" width="400" trigger="click">
          <img src="../../img/手腕.png" alt="" />
          <input
            slot="reference"
            type="text"
            ref="hander"
            v-model="text_hander"
          />
        </el-popover>
        CM（厘米）
        <i>茎突（腕部突出的骨块）以下的手腕周长，测量时手掌打开。</i>
      </div>
      <div class="foot">
        <div class="inputs">
          <span>脚踝：</span>
          <el-popover placement="right" width="400" trigger="click">
            <img src="../../img/脚腕.png" alt="" />
            <input
              slot="reference"
              type="text"
              ref="footer"
              v-model="text_footer"
            />
          </el-popover>
          CM（厘米）
          <i>小腿和脚踝之间最细处</i>
        </div>
      </div>
      <div class="count">
        <input type="button" value="计算" @click="click_dim" />
      </div>
      <div class="result" v-show="resultVisible">
        <p>胸部： {{ this.result }}cm</p>
        <p>前臂： {{ this.result1 }}</p>
        <p>大腿： 64.0cm</p>
        <p>肱二头肌： 47.8cm</p>
        <p>颈部： 47.2cm</p>
        <p>小腿：54.6</p>
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
      text_hander: "",
      text_footer: "",
      text_height: "",
      result: "",
      result1: "",
      result2: ""
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
        message: "手腕不能为空，请您请输入手腕维度!",
        type: "error"
      });
    },
    open3() {
      this.$message({
        showClose: true,
        message: "脚踝不能为空，请您请输入脚踝维度!",
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
    click_dim: function() {
      console.log(this.text_height);

      if (this.text_height && this.text_hander && this.text_footer) {
        this.resultVisible = true;
        this.result = this.keep_decimal(
          this.text_height * 0.62 + this.text_hander
        );
        this.result1 = this.keep_decimal(this.text_hander * 1.7);
        this.result2 = this.keep_decimal(
          this.text_height * 0.25 + this.text_footer
        );
      } else {
        if (!this.text_height) {
          this.open1();
          this.$refs.height.focus();
        } else if (!this.text_hander) {
          this.open2();
          this.$refs.hander.focus();
        } else {
          this.open3();
          this.$refs.footer.focus();
        }
      }
    }
  }
};
</script>

<style scoped>
.center {
  width: 1180px;
  height: 850px;
  margin: 20px auto;
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
.height {
  margin: 20px 0px;
}
.height input {
  margin: 0px 5px;
  width: 120px;
  height: 20px;
}
.hand {
  margin: 20px 0px;
}
.hand input {
  width: 120px;
  height: 20px;
}
.foot {
  margin: 20px 0px;
}
.foot input {
  width: 120px;
  height: 20px;
}
.count {
  margin-left: 600px;
}
.count input {
  width: 120px;
  height: 40px;
  font-size: 16px;
}
i {
  color: #ed3a4a;
}
</style>
