<template>
  <div>
    <div>
      <info-main></info-main>
    </div>
    <div>
      <calendar></calendar>
    </div>
  </div>
</template>

<script>
import DetailInfo from "../plandetail/DetailInfo";
import Calendar from "../plandetail/Calendar";
export default {
  name: "DetailBody",
  data() {
    return {};
  },
  components: { "info-main": DetailInfo, calendar: Calendar }
};
</script>

<style scoped></style>
