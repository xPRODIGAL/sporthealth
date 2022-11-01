<template>
  <div class="traningpart">
    <ul>
      <li>
        <button>12</button><span>13</span>
        <img src="../../img/3.jpg" alt="" />
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "TraningPart",
  data() {
    return {
      info: ""
    };
  },
  methods: {}
};
</script>

<style scoped>
li {
  height: 100px;
  margin-bottom: 2px;
  background: white;
}
img {
  float: right;
  height: 100%;
  width: 170px;
}
button {
  cursor: pointer;
  width: 50px;
  height: 50px;
  background: #1427e6;
  border: none;
  outline: none;
  font-size: 25px;
  color: white;
  opacity: 0.8;
}
button:hover {
  opacity: 1;
}
span {
  font-size: 25px;
  margin-left: 20px;
  cursor: pointer;
}
</style>
