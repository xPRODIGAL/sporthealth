<template>
  <div>
    <!-- <el-form ref="form" label-width="80" v-for="item in form" disabled> -->
    <el-form
      ref="form"
      label-width="80"
      v-for="(item, index) in usersData"
      :key="index"
      disabled
    >
      <el-form-item label="我的昵称" style="display: flex">
        <el-input v-model="item.userName"></el-input>
      </el-form-item>
      <el-form-item label="邮箱号" style="display: flex;">
        <el-input v-model="item.email" style="margin-left: 10px"></el-input>
      </el-form-item>
      <el-form-item label="我的性别" style="display: flex">
        <el-input v-model="item.sex"></el-input>
      </el-form-item>
      <el-form-item label="我的身高" style="display: flex">
        <el-input v-model="item.height + '(cm)'"></el-input>
      </el-form-item>
      <el-form-item label="我的体重" style="display: flex">
        <el-input v-model="item.weight + '(kg)'"></el-input>
      </el-form-item>
      <el-form-item label="我的目标" style="display: flex">
        <el-input v-model="item.aim"></el-input>
      </el-form-item>
    </el-form>
    <!-- </el-form> -->
  </div>
</template>

<script>
import { getInfos } from "../../../network/user";
export default {
  name: "UserInfo",
  data() {
    return {
      usersData: []
    };
  },
  created() {
    getInfos({
      userId: localStorage.getItem("userId")
    }).then(res => {
      // console.log(res);
      if (res.code == 1) {
        this.usersData = res.data;
        console.log(res.data[0].pic);
        localStorage.setItem("pic", res.data[0].pic);
        localStorage.setItem("userName", res.data[0].userName);
      }
    });
  }
};
</script>

<style scoped></style>
