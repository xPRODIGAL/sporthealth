<template>
  <div class="box">
    <el-button type="text" @click="methodshow2">健身知识</el-button>
    <el-button type="text" @click="methodshow3">健身计划</el-button>
    <el-button type="text" @click="methodshow4">健身课程</el-button>

    <div style="display: flex; height: 100px;margin-bottom: 20px">
      <div v-show="show2" class="transition-box">
        <table>
          <tr>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
          </tr>
          <tr>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
          </tr>
          <tr>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
          </tr>
          <tr>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
          </tr>
          <tr>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
          </tr>
        </table>
      </div>

      <div v-show="show3" class="transition-box">
        <table>
          <tr>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
          </tr>
        </table>

        <table>
          <tr>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
          </tr>
        </table>

        <table>
          <tr>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
          </tr>
        </table>

        <table>
          <tr>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
            <td>吉姆·斯托帕尼六周极速脱脂计划</td>
          </tr>
        </table>
      </div>

      <div v-show="show4" class="transition-box">
        <table>
          <tr>
            <td>莱美搏击操:中级训练</td>
            <td>莱美搏击操:中级训练</td>
            <td>莱美搏击操:中级训练</td>
          </tr>
          <tr>
            <td>莱美搏击操:中级训练</td>
            <td>莱美搏击操:中级训练</td>
            <td>莱美搏击操:中级训练</td>
          </tr>
          <tr>
            <td>莱美搏击操:中级训练</td>
            <td>莱美搏击操:中级训练</td>
            <td>莱美搏击操:中级训练</td>
          </tr>
          <tr>
            <td>莱美搏击操:中级训练</td>
            <td>莱美搏击操:中级训练</td>
            <td>莱美搏击操:中级训练</td>
          </tr>
          <tr>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
            <td>莱美搏击操:基础训练</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    show2: true,
    show3: false,
    show4: false
  }),
  methods: {
    methodshow2: function() {
      if (this.show2 == false) {
        this.show2 = !this.show2;
        this.show3 = false;
        this.show4 = false;
      }
    },
    methodshow3: function() {
      if (this.show3 == false) {
        this.show3 = !this.show3;
        this.show2 = false;
        this.show4 = false;
      }
    },
    methodshow4: function() {
      if (this.show4 == false) {
        this.show4 = !this.show4;
        this.show2 = false;
        this.show3 = false;
      }
    }
  }
};
</script>

<style scoped>
.transition-box {
  margin-bottom: 10px;
  width: 900px;
  height: 100px;
  color: black;
}
.box {
  padding: 20px 20px 20px 20px;
}

.el-button:hover {
  color: #ed0c1c;
}
table {
  width: 980px;
  margin-left: 20px;
}
table td {
  width: 30%;
}
</style>
