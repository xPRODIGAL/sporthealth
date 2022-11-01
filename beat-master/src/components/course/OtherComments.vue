<template>
  <div>
    <div
      class="other_comments"
      v-for="(item, index) in comment"
      :key="{ index }"
    >
      <div class="touxiang"><img src="../../img/user1.jpg" alt="" /></div>
      <h5>{{ item.name }}:</h5>
      <div class="pinglun">
        <p>
          {{ item.msg }}<span>{{ item.msg.length + "/150" }}</span>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Comments",
  props: {
    commentData: {}
  },
  data() {
    return {
      comment: [
        {
          name: "会费的藏书",
          msg: "sss"
        }
      ]
    };
  }
};
</script>

<style scoped>
.other_comments {
  width: 100%;
  height: 80px;
  border: 1px solid rgba(209, 194, 194, 0.1);
  background: white;
  padding-top: 10px;
  margin-bottom: 20px;
}
.touxiang {
  width: 80px;
  height: 80px;
  float: left;
}

.touxiang img {
  width: 70px;
  height: 70px;
}
.pinglun {
  position: relative;
  float: left;
  top: 10px;
  width: 600px;
  height: 60px;
  font-size: 14px;
  /*border: 1px solid rgba(0,0,0,0.31);*/
}
.pinglun p {
  position: absolute;
  width: 700px;
  /*left: 10px;*/
  /*top: 0;*/
}
.pinglun span {
  position: absolute;
  left: 664px;
  top: 31px;
}
</style>
