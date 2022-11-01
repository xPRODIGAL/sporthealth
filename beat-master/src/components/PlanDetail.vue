<template>
  <div class="plandetail">
    <div class="plan-head"><head-main></head-main></div>
    <div class="plan-main"><detail-body></detail-body></div>
    <div class="actions"><relatedactions></relatedactions></div>
    <div class="actions">
      <zixun-main></zixun-main>
    </div>
  </div>
</template>

<script>
import DetailHead from "./plan/plandetail/DetailHead";
import DetailBody from "./plan/plandetail/DetailBody";
import RelatedActions from "./plan/plandetail/RelatedActions";
import ZiXun from "./plan/plandetail/ZiXun";
export default {
  name: "plandetail",
  data() {
    return {};
  },
  components: {
    "head-main": DetailHead,
    "detail-body": DetailBody,
    relatedactions: RelatedActions,
    "zixun-main": ZiXun
  }
};
</script>

<style scoped>
.plandetail {
  width: 100%;
  min-height: 700px;
}
.plan-main {
  width: 1000px;
  margin-top: 20px;
  padding: 4px 10px;
  background: white;
  margin: auto;
  overflow: hidden;
}
.actions {
  width: 1020px;
  margin: auto;
  background: white;
  margin-top: 20px;
}
</style>
