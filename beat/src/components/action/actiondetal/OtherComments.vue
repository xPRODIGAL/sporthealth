<template>
  <div class="other_comments">
    <div class="profile">
      <img src="../../../img/mayun.png" alt="" />
      <h5>用户:{{ name }}</h5>
    </div>
    <div class="comment">
      <p>
        {{ msg }}<span>{{ msg.length + "/150" }}</span>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Comments",

  user: {
    type: Object,
    default: function() {
      //对象或数组的默认值必须使用函数的形式来返回
      return { id: 3306, username: "秋香" };
    }
  },
  data() {
    return {
      profile_url: "",
      name: "马云",
      msg: "我觉得这个动作难度较大！！"
    };
  }
};
</script>

<style scoped>
.other_comments {
  width: 1000px;
  height: 120px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  background: white;
  padding-top: 10px;
}
.profile {
  width: 120px;
  height: 110px;
  float: left;
}
.profile h5 {
  margin-left: 10px;
}
.profile img {
  width: 70px;
  height: 70px;
}
.comment {
  position: relative;
  float: left;
  top: 15px;
  width: 850px;
  height: 80px;
  font-size: 14px;
  /*border: 1px solid rgba(0,0,0,0.31);*/
}
.comment p {
  position: absolute;
  width: 820px;
  left: 10px;
  top: 0;
}
.comment span {
  position: absolute;
  left: 820px;
  top: 88px;
}
</style>
