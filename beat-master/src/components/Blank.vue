<template>
  <div></div>
</template>

<script>
export default {
  name: "Blank",
  data() {
    return {};
  },
  created() {
    this.$router.go(-1);
  }
};
</script>

<style scoped></style>
