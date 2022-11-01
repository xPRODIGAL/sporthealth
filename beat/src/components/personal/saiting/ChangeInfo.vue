<template>
  <div>
    <el-form ref="" :model="info" label-width="80">
      <el-form-item label="我的昵称" style="display: flex">
        <el-input v-model="info.userName"></el-input>
      </el-form-item>
      <el-form-item label="我的性别" style="display: flex">
        <el-radio v-model="radio" label="男">男</el-radio>
        <el-radio v-model="radio" label="女">女</el-radio>
      </el-form-item>
      <el-form-item label="我的身高" style="display: flex">
        <el-input v-model="info.height"></el-input>
      </el-form-item>
      <el-form-item label="我的体重" style="display: flex">
        <el-input v-model="info.weight"></el-input>
      </el-form-item>
      <el-form-item label="我的目标" style="display: flex">
        <el-radio v-model="aim" label="减脂">减脂</el-radio>
        <el-radio v-model="aim" label="塑型">塑型</el-radio>
        <el-radio v-model="aim" label="增肌">增肌</el-radio>
        <button @click="ascertain" style="margin-left: 300px;width: 60px">
          保存
        </button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import { updateInfo, getInfos } from "../../../network/user";
export default {
  name: "Changeinfo",
  inject: ["reload"],
  data() {
    return {
      usersData: [],
      info: {
        userName: "",
        height: "",
        weight: ""
      },
      radio: "男",
      aim: "减脂"
    };
  },
  created() {
    getInfos({
      userId: localStorage.getItem("userId")
    }).then(res => {
      // console.log(res);
      if (res.code == 1) {
        // console.log(res);
        this.usersData = res.data;
        // console.log(this.usersData);
        for (let item of this.usersData) {
          // console.log(item.userId);
          if (item.userId == localStorage.getItem("userId")) {
            this.info.userName = item.userName;
            this.info.height = item.height;
            this.info.weight = item.weight;
            this.radio = item.sex;
            this.aim = item.aim;
          }
          localStorage.setItem("pic", item.pic);
          localStorage.setItem("userName", item.userName);
        }
      }
    });
  },

  methods: {
    ascertain() {
      updateInfo({
        userId: localStorage.getItem("userId"),
        userName: this.info.userName,
        sex: this.radio,
        height: this.info.height,
        weight: this.info.weight,
        aim: this.aim
      }).then(res => {
        console.log(res);
        localStorage.removeItem("userName");
        localStorage.setItem("userName", this.info.userName);
      });
    }
  }
};
</script>

<style scoped></style>
