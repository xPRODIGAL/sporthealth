<template>
  <div class="title">
    <div class="title_center">
      <span>当前位置：</span>
      <router-link to="/">健身</router-link>
      <span>>></span>
      <router-link to="/tools/toolcenter">实用工具</router-link>
      <span v-if="$store.state.tooldetail">>></span>
      <span v-if="$store.state.tooldetail">{{ $store.state.tooldetail }}</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "toolscrumbs",
  data() {
    return {};
  }
};
</script>

<style scoped>
.title {
  height: 60px;
  width: 100%;
  background: #eaedf2;
  padding: auto;
}
.title_center {
  width: 1180px;
  font-size: 14px;
  margin: auto;
  /*background: #ed3a4a;*/
  padding-top: 16px;
}
.title_center a {
  text-decoration: none;
  color: #8d8d8d;
}
</style>
