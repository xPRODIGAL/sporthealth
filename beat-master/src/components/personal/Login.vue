<template>
  <div class="container">
    <div class="c_header">
      <div class="c_header_div">
        <div class="c_header_div_left">
          <a href="index.html"
            ><img src="../../img/logo.png" height="78" width="178"
          /></a>
        </div>
        <div class="c_header_div_right"><span>| 登录</span></div>
      </div>
    </div>
    <div>
      <div class="user-email">
        <div class="left"><span>邮箱</span></div>
        <div class="right" style="color: red" id="error_id">
          <span type="text" v-model="err_email">{{ err_email }}</span>
        </div>
      </div>

      <div class="down">
        <input
          id="id"
          type="text"
          ref="email"
          placeholder="请输入邮箱"
          @keyup.enter="log_on"
          v-model="email"
          @change="check_email"
        />
      </div>

      <div class="user-email">
        <div class="left"><span>密码</span></div>
        <div class="right" style="color: red" id="error_pwd">
          <span type="text" v-model="err_password">{{ err_password }}</span>
        </div>
      </div>

      <div class="down">
        <input
          id="pwd"
          type="password"
          placeholder="请输入密码"
          @keyup.enter="log_on"
          v-model="password"
          @change="check_password"
        />
        <div class="remember">
          <label
            ><input
              type="checkbox"
              @keyup.enter="log_on"
              v-model="checked"
              value="checked"
            />记住密码
          </label>
        </div>
      </div>
    </div>

    <div class="finish">
      <input type="button" id="btn" value="登录" @click="log_on" />
      <span class="login_error"></span>

      <br />
      <div class="problem">
        <router-link to="/Register" class="pro">新用户注册</router-link
        ><span>|</span
        ><router-link to="/retrieve" class="pro">找回密码</router-link>
        <br /><br />
        <a href="" class="pro">我已阅读《用户协议》</a>
      </div>
    </div>
  </div>
</template>

<script>
import { login } from "../../network/login";
export default {
  name: "Login",
  data() {
    return {
      data: "",
      email: "",
      err_email: "",
      password: "",
      err_password: "",
      checked: false,
      colo: {
        color: "#409eff",
        borderBottom: "solid 1.5px #36A4FF"
      }
    };
  },
  created: function() {
    var is_remember = localStorage.getItem("isRemember");
    if (is_remember) {
      this.checked = true;
      this.email = localStorage.getItem("email");
      this.password = localStorage.getItem("password");
    }
  },
  mounted() {
    // this.$refs.email.focus();
  },
  methods: {
    // close: function() {
    //   Bus.$emit("close", false);
    // },
    // resign: function() {
    //   Bus.$emit("login", false);
    //   Bus.$emit("resign", true);
    // },
    // retrieve: function() {
    //   Bus.$emit("login", false);
    //   Bus.$emit("retrieve", true);
    // },
    check_email: function() {
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
        this.err_email = "* 请输入邮箱";
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
    //账号密码登录
    log_on() {
      login({
        email: this.email,
        password: this.password
      }).then(res => {
        console.log(res.data);
        if (res.code == 1) {
          localStorage.setItem("token", res.data.token);
          localStorage.setItem("userName", res.data.result.userName);
          localStorage.setItem("userId", res.data.result.userId);
          localStorage.setItem("pic", res.data.result.pic);
          this.$router.push("/");
          this.$router.go(0);
        } else {
          this.$message.error("账号或密码错误，登陆失败");
        }
      });
    }
  }
};
</script>

<style scoped>
.container {
  position: relative;
  /*border: solid 2px black;*/
  width: 900px;
  height: 630px;
  margin: auto;
  /*margin-top:40px;*/
  box-shadow: 0px 0px 10px 5px #aaa;
  background: white;
  margin-top: 40px;
}

.c_header {
  width: 900px;
  height: 100px;
  display: flex;
  justify-content: center;
  background-color: #2b2b32;
  margin-bottom: 30px;
}
.c_header_div {
  display: flex;
  justify-content: center;
  padding-top: 10px;
}
.c_header .c_header_div span {
  padding-top: 20px;
  margin-bottom: 10px;
  margin-left: 20px;
  font-size: 30px;
  color: white;
}
.c_header_div img {
  height: 38px;
  width: 60px;
}
.c_header_div_left {
  padding-top: 20px;
}
.c_header_div_right {
  padding-top: 20px;
}

.user-email {
  margin-left: 330px;
  width: 400px;
  height: 60px;
}

.user-email .left {
  margin-top: 30px;
  float: left;
  height: 30px;
}
.user-email span {
  font-size: 20px;
}
/*#phone{*/
/*    */
/*}*/
.user-email .right {
  margin-top: 26px;
  margin-right: 150px;
  float: right;
  height: 30px;
}
.user-email .right input {
  width: 100px;
  height: 30px;
  border: none;
}
.down {
  margin-left: 330px;
  width: 400px;
  height: 40px;
}
.remember {
  position: relative;
  top: 20px;
  right: 110px;
  width: 400px;
  height: 40px;
}

.remember label input {
  width: 20px;
  height: 20px;
  margin-left: 110px;
  position: relative;
  top: 4px;
}

.down input {
  width: 250px;
  height: 30px;
}

.finish {
  margin-top: 70px;
  margin-left: 360px;
  height: 100px;
  width: 240px;
}
.finish input {
  height: 50px;
  width: 140px;
  background-color: red;
  border: none;
  font-size: 20px;
  color: white;
  margin-left: 20px;
}

.problem {
  text-align: center;
  margin-top: 15px;
  width: 200px;
  /*margin-left: 340px;*/
}
a {
  margin-top: 20px;
  text-decoration: none;
  color: black;
}
a:hover {
  color: #ff171d;
}
.login_error {
  width: 550px;
  height: 80px;
  margin: auto;
  text-align: center;
  line-height: 80px;
  color: #64b7ff;
  font-size: 1em;
}
</style>
