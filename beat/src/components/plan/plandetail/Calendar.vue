<template>
  <div class="jihua_third" id="jieshao_third">
    <table v-for="i in week_num">
      <td
        v-for="(item, index) in info"
        v-if="item.week == i && item.day == 1"
        class="first"
      >
        <p>4444444444555555555周</p>
      </td>
      <td
        v-for="(item, index) in info"
        v-if="item.week == i && item.day == 1"
        @click="get_coursename(item.name, item.id)"
        :class="{ select: item.name == '休息', daka: item.daka == '打卡' }"
      >
        <h1>22222222222</h1>
        <span>333333333333333</span>
      </td>
      <td
        v-for="(item, index) in info"
        v-if="item.week == i && item.day != 1"
        @click="get_coursename(item.name, item.id)"
        :class="{ select: item.name == '休息', daka: item.daka == '打卡' }"
      >
        <h1>33333333333333</h1>
        <span>5555555555555555</span>
      </td>
      <td class="buchong" v-for="s in buchong_num" v-if="i == week_num">
        <h1>01</h1>
        <span></span>
      </td>
    </table>
  </div>
</template>

<script>
export default {
  name: "Calendar",
  data() {
    return {
      info: "",
      infoa: "",
      week_num: "",
      buchong_num: "",
      richeng: ""
    };
  },
  created() {},

  methods: {}
};
</script>

<style scoped>
table {
  width: 1000px;
  height: 150px;
  border-collapse: collapse;
  border: none;
  cellspacing: none;
  cellpadding: none;
}

.first {
  width: 80px;
  border: none;
}

.first p {
  position: relative;
  top: 55px;
  font-size: 30px;
  color: rgba(0, 0, 0, 0.7);
}

span {
  font-size: 14px;
  position: relative;
  top: 40px;
}

table td {
  border: solid 2px rgba(0, 0, 0, 0.07);
  border-bottom: 1px;
  width: 130px;
  height: 150px;
  text-align: center;
  padding-left: 10px;
  padding-right: 10px;
  margin: 0;
}

h1 {
  position: relative;
  top: 35px;
}

td:hover h1 {
  color: white;
}

td:hover span {
  color: white;
}

td:hover {
  background: rgba(237, 0, 2, 0.68);
}

.first:hover {
  background: white;
}

a {
  text-decoration: none;
  color: rgba(0, 0, 0, 0.7);
}

.buchong h1 {
  opacity: 0;
}

.buchong:hover {
  background: white;
  color: white;
}

.select {
  background: #d7d7d7;
  opacity: 0.8;
}

.select:hover {
  background: #d7d7d7;
  opacity: 1;
}

.daka {
  background: #409eff;
  opacity: 0.8;
}

.daka:hover {
  background: #409eff;
  color: black;
  opacity: 1;
}

.daka:hover span {
  color: black;
}

.daka:hover h1 {
  color: black;
}

.select:hover h1 {
  color: black;
}

.select:hover span {
  color: black;
}

td {
  cursor: pointer;
}

.first {
  cursor: default;
}
</style>
