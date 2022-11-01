<template>
  <div class="main">
    <div class="main_header">
      <div class="main_header_div">
        <div class="main_header_div_left">
          <a href=""><img src="../../img/logo.png" height="78" width="178"/></a>
        </div>
        <div class="main_header_div_right">
          <span>| 找回密码</span>
        </div>
      </div>
    </div>
    <div>
      <div class="kong"></div>
      <div class="little_part">
        <span style="font-size: 18px"
          >邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</span
        >
        <input
          id="id"
          type="text"
          class="inputBox"
          placeholder="请输入邮箱号"
          v-model="email"
          @change="check_email"
        />
        <span
          class="right"
          id="error_id"
          style="color: red"
          v-model="err_email"
          >{{ err_email }}</span
        >
      </div>
      <div class="little_part">
        <span style="font-size: 18px"
          >密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码</span
        >
        <input
          id="pwd"
          type="password"
          class="inputBox"
          placeholder="请输入密码"
          v-model="password"
          @change="check_password"
        />
        <span
          class="right"
          style="color: red"
          id="error_pwd"
          v-model="err_password"
          >{{ err_password }}</span
        >
      </div>
      <div class="little_part">
        <span style="font-size: 18px">确认密码</span>
        <input
          id="name"
          type="password"
          class="inputBox"
          placeholder="请再次输入密码"
          @change="check_rePassword"
          v-model="rePassword"
        />
        <span
          class="right"
          style="color: red"
          id="error_rePassword"
          v-model="err_rePassword"
          >{{ err_rePassword }}</span
        >
      </div>
      <div class="little_part">
        <span style="font-size: 18px">验&nbsp;&nbsp;证&nbsp;&nbsp;码</span>
        <input
          id="yanzheng"
          type="text"
          class="inputBox01"
          placeholder="请输入验证码"
          @change="check_checking"
          v-model="checking_code"
        />
        <button
          id="yan"
          @click="sendCode"
          v-model="gain_text"
          :disabled="gain_text === '获取验证码' ? false : true"
        >
          {{ gain_text }}
        </button>
        <span
          class="right"
          style="color: red"
          id="error_yanzheng"
          v-model="err_checking_code"
          >{{ err_checking_code }}</span
        >
      </div>
      <div class="finish">
        <input
          id="btn_register"
          type="button"
          value="重置密码"
          @click="retrieve_go"
        />
      </div>
    </div>
  </div>
</template>

<script>
import { mail, retrieve } from "../../network/login";
export default {
  name: "retrieve",
  data() {
    return {
      email: "",
      err_email: "",
      password: "",
      err_password: "",
      checking_code: "",
      err_checking_code: "",
      rePassword: "",
      err_rePassword: "",
      gain_text: "获取验证码",
      code_dist: {},
      count: 30
    };
  },

  methods: {
    close: function() {
      Bus.$emit("close", false);
    },
    login: function() {
      Bus.$emit("resign", false);
      Bus.$emit("login", true);
    },
    open1: function() {
      this.$message({
        showClose: true,
        message: "恭喜您修改密码成功,请登录！！！",
        type: "success"
      });
    },

    check_email: function() {
      // var reg_email = /^1[345678]\d{9}$/;
      var reg_email = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
      if (this.email) {
        if (reg_email.test(this.email)) {
          this.err_email = "";
          return true;
        } else {
          this.err_email = "* 请输入正确的邮箱";
          return false;
        }
      } else {
        this.err_email = "* 请输入手机号";
        return false;
      }
    },
    check_password: function() {
      var reg_pwd = /^\w{6,18}$/;
      if (this.password) {
        if (reg_pwd.test(this.password)) {
          this.err_password = "";
          return true;
        } else {
          this.err_password = "* 密码格式不合法";
          return false;
        }
      } else {
        this.err_password = "* 请输入密码";
        return false;
      }
    },
    check_checking: function() {
      var reg_checking = /^\d{4}$/;

      if (this.checking_code) {
        if (reg_checking.test(this.checking_code)) {
          this.err_checking_code = "";
          return true;
        } else {
          this.err_checking_code = "* 请输入正确的验证码";
          return false;
        }
      } else {
        this.err_checking_code = "* 请输入验证码";
        return false;
      }
    },
    check_rePassword: function() {
      if (this.rePassword) {
        if (this.password == this.rePassword) {
          this.err_rePassword = "";
          return true;
        } else {
          this.err_rePassword = "* 两次输入密码不一致";
          return false;
        }
      } else {
        this.err_rePassword = "* 请再次输入密码";
        return false;
      }
    },
    //修改发送验证码
    sendCode: function() {
      var countDown = setInterval(() => {
        if (this.count < 1) {
          this.gain_text = "获取验证码";
          this.count = 60;
          clearInterval(countDown);
        } else {
          this.gain_text = this.count-- + "s后重发";
        }
      }, 1000);
      mail({
        email: this.email
      }).then(res => {
        console.log(res);
      });
    },
    // 修改密码
    retrieve_go() {
      if (
        this.check_checking() &&
        this.check_rePassword() &&
        this.check_password() &&
        this.check_email()
      ) {
        retrieve({
          email: this.email,
          password: this.password,
          code: this.checking_code
        }).then(res => {
          if (res.code == 1) {
            this.$router.push("/login");
            this.open1();
          } else {
            this.$message.error("修改失败,邮箱错误!!!");
          }
        });
      } else {
        this.$message.error("请按提示正确填好信息");
      }
    }
  }
};
</script>

<style scoped>
.main {
  /*border: solid 2px black;*/
  width: 900px;
  height: 630px;
  margin: auto;
  margin-top: 40px;
  box-shadow: 0px 0px 10px 5px #aaa;
}

.header_ti {
  height: 50px;
  width: 1520px;
}

.main_header {
  width: 900px;
  height: 100px;
  display: flex;
  justify-content: center;
  background-color: #2b2b32;
  margin-bottom: 30px;
}

.main_header_div {
  display: flex;
  justify-content: center;
  padding-top: 10px;
}

.main_header .main_header_div span {
  padding-top: 20px;
  margin-bottom: 10px;
  margin-left: 20px;
  font-size: 30px;
  color: white;
  width: 72px;
}

.main_header_div img {
  height: 38px;
  width: 60px;
}

.main_header_div_left {
  padding-top: 20px;
}

.main_header_div_right {
  padding-top: 20px;
}

.kong {
  height: 13px;
}

.little_part {
  margin-top: 10px;
  margin-left: 310px;
  /*width: 400px;*/
  height: 80px;
  line-height: 80px;
  /*text-align: center;*/
}

.inputBox {
  width: 260px;
  height: 40px;
  margin-left: 10px;
}

.inputBox01 {
  width: 130px;
  height: 40px;
  margin-left: 10px;
}

#yan {
  width: 120px;
  height: 40px;
  background: red;
  color: white;
}

.finish {
  margin-top: 40px;
  margin-left: 410px;
  height: 70px;
  width: 140px;
}

.finish input {
  height: 50px;
  width: 140px;
  background-color: red;
  border: none;
  font-size: 20px;
  color: white;
}

.finish a {
  color: #2b2b32;
  text-decoration: none;
}

.finish a:hover {
  color: #d63318;
  text-decoration: none;
}
</style>
