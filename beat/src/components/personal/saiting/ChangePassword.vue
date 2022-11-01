<template>
  <div class="change_password">
    <table class="tb" border="0" cellspacing="15" align="center">
      <tr>
        <td>个人邮箱:</td>
        <td colspan="3">
          <input
            type="text"
            id="tel"
            style="width: 300px;height: 30px"
            v-model="info.email"
          />
        </td>
      </tr>
      <tr>
        <td>旧密码:</td>
        <td colspan="3">
          <input
            type="password"
            id="old_password"
            style="width: 300px;height: 30px"
            v-model="info.password"
          />
        </td>
      </tr>
      <tr>
        <td>新密码:</td>
        <td colspan="3">
          <input
            type="password"
            id="new_password"
            style="width: 300px;height: 30px"
            v-model="info.new_password"
          />
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <button
            @click="btn_ok"
            value=""
            style="width: 80px;height: 30px;margin-left: 100px"
          >
            确认修改
          </button>
          <input
            type="submit"
            value="取消"
            style="width: 80px;height: 30px;margin-left: 50px"
            @click="reset_btn"
          />
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
import { resetPassword } from "../../../network/user";
export default {
  name: "Viewrecord",
  data() {
    return {
      info: {
        email: "",
        password: "",
        new_password: ""
      }
    };
  },
  methods: {
    btn_ok() {
      if (
        this.info.email !== "" &&
        this.info.password !== "" &&
        this.info.new_password !== ""
      ) {
        if (this.info.new_password.length < 6) {
          this.$message({
            message: "密码长度不得小于六位！！！",
            type: "error"
          });
        } else {
          resetPassword({
            id: localStorage.getItem("userId"),
            email: this.info.email,
            password: this.info.password,
            new_password: this.info.new_password
          }).then(res => {
            console.log(res.code);
            if (res.code == 1) {
              this.$message({
                message: "密码修改成功,请重新登录！！！",
                type: "success"
              });
              localStorage.removeItem("token");
              this.$router.go(0);
            } else {
              this.$message({
                message: "密码或邮箱填写错误！！！",
                type: "error"
              });
            }
          });
        }
      } else {
        this.$message({
          message: "请填写完整信息！！！",
          type: "error"
        });
      }
    },
    reset_btn() {
      this.info = {
        email: "",
        password: "",
        new_password: ""
      };
    }
  }
};
</script>

<style scoped>
.change_password {
  padding-top: -20px;
}
.tip {
  width: 758px;
  height: 60px;
  background: #79ffda;
  /*display: none;*/
}
</style>
