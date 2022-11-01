<template>
  <el-input
    type="textarea"
    :rows="3"
    placeholder="谈谈宁的感想..."
    maxlength="150"
    show-word-limit
    v-model="textarea">
  </el-input>
</template>

<script>
  export default {
    data() {
      return {
        textarea: ''
      }
    }
  }
</script>

<style scoped>


</style>
