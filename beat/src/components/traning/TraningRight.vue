<template>
  <el-row class="tac">
    <el-col :span="24">
      <el-menu
        default-active="2"
        class="el-menu-vertical-demo"
        @open="handleOpen"
        @close="handleClose"
      >
        <el-submenu v-for="i in week_num" :index="String(i)" v-model="info">
          <template slot="title">
            <span
              class="title"
              v-for="item in info"
              v-if="item.week == i && item.day == 1"
              >第{{ i }}周</span
            >
          </template>
          <el-menu-item-group>
            <el-menu-item
              v-for="item in info"
              v-if="item.week == i && item.day == 1"
              :class="{ select: item.name == '休息', daka: item.daka == true }"
              ><span>12天</span><span>13</span></el-menu-item
            >
            <el-menu-item
              v-for="item in info"
              v-if="item.week == i && item.day != 1"
              :class="{ select: item.name == '休息', daka: item.daka == true }"
              ><span>12天</span><span>13</span></el-menu-item
            >
          </el-menu-item-group>
        </el-submenu>
      </el-menu>
    </el-col>
  </el-row>
</template>

<script>
export default {
  data() {
    return {
      week_num: "",
      info: "",
      select_index: 0
    };
  },
  created() {},
  methods: {
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    }
  }
};
</script>

<style scoped>
li {
  width: 280px;
  border-radius: 0;
}
.el-menu-item span {
  margin-left: 10px;
}
.el-menu-item:hover span {
  color: red;
}
.el-submenu .title {
  margin-left: 80px;
}
span {
  color: black;
}
.select {
  background: #d7d7d7;
}
.select:hover span {
  color: black;
}
.daka {
  color: #409eff;
}
.daka:hover span {
  color: black;
}
</style>
