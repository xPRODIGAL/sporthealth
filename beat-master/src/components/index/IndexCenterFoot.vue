<template>
  <div class="foot">
    <div class="center"></div>
  </div>
</template>

<script>
export default {
  name: "index_center_foot",
  data() {
    return {};
  }
};
</script>
<style scoped>
.foot {
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
  width: 100%;
  height: 100%;
  background: #2b2b2e;
  /*background: rgba(229, 229, 229, 0.36);*/
}

.foot .center {
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
  width: 1020px;
  text-align: center;
  color: #666;
}
</style>
