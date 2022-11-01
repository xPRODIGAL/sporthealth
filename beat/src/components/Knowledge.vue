<template>
  <div class="zixun">
    <div class="show">
      <knowledgeBody></knowledgeBody>
    </div>
  </div>
</template>

<script>
import knowledgeBody from "./knowledge/knowledgeBody";
export default {
  name: "Knowledge",
  data() {
    return {};
  },
  components: { knowledgeBody: knowledgeBody }
};
</script>

<style scoped>
.zixun {
  width: 100%;
  background: white;
  min-height: 100%;
}
.show {
  padding-top: 20px;
  width: 1180px;
  margin: auto;
  background: white;
}
p {
  font-size: 20px;
}
</style>
