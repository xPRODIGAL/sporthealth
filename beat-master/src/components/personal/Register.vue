<template>
  <div class="main">
    <div class="main_header">
      <div class="main_header_div">
        <div class="main_header_div_left">
          <a href=""><img src="../../img/logo.png" height="78" width="178"/></a>
        </div>
        <div class="main_header_div_right">
          <span>| 注册</span>
        </div>
      </div>
    </div>
    <div>
      <div class="kong"></div>
      <div class="little_part">
        <span style="font-size: 18px">邮箱号</span>
        <input
          id="id"
          type="text"
          class="kuang"
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
        <span style="font-size: 18px">设密码</span>
        <input
          id="pwd"
          type="password"
          class="kuang"
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
        <span style="font-size: 18px">用户名</span>
        <input
          id="name"
          type="text"
          class="kuang"
          placeholder="请输入用户名"
          @change="check_name"
          v-model="name"
        />
        <span
          class="right"
          style="color: red"
          id="error_name"
          v-model="err_name"
          >{{ err_name }}</span
        >
      </div>
      <div class="finish">
        <input
          id="btn_register"
          type="button"
          value="完成注册"
          @click="resign_go"
        /><br />
        <router-link to="/Login">已有账号？请登录</router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { register } from "../../network/login";

export default {
  name: "register",
  data() {
    return {
      email: "",
      err_email: "",
      password: "",
      err_password: "",
      name: "",
      err_name: ""
    };
  },

  methods: {
    login: function() {
      Bus.$emit("resign", false);
      Bus.$emit("login", true);
    },
    check_email: function() {
      var reg_mail = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
      if (this.email) {
        if (reg_mail.test(this.email)) {
          this.err_email = "";
          return true;
        } else {
          this.err_email = "* 请输入正确的邮箱号";
          return false;
        }
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
    check_name: function() {
      var reg_name = /^[\u4e00-\u9fa5_a-zA-Z0-9]{1,10}$/;
      if (this.name) {
        if (reg_name.test(this.name)) {
          this.err_name = "";
          return true;
        } else {
          this.err_name = "* 用户名不合法";
          return false;
        }
      } else {
        this.err_name = "* 请输入账户名";
        return false;
      }
    },
    //注册
    resign_go() {
      if (this.check_name() && this.check_email() && this.check_password()) {
        register({
          email: this.email,
          password: this.password,
          name: this.name
          // code: this.code
        }).then(res => {
          console.log(res);
          if (res.code == 1) {
            this.$router.push("/login");
            this.$message.error("账号已存在!!!");
          } else if (res.code == 0) {
            this.$router.push("/login");
            // this.$router.go(0);
            this.$message.success("注册成功，请登录!!!");
          } else {
            this.$message.error("注册失败!!!");
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
  background: white;
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

.kuang {
  width: 260px;
  height: 40px;
  margin-left: 10px;
}

.kuang01 {
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
