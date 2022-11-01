<template>
  <div class="index_center_title">
    <div class="title_left">
      <img :src="title_img_link.play_video" height="50" width="40" />

      <h1>视频</h1>
    </div>
    <div class="title_right">
      <div class="right" id="div02_title_link" v-for="link in links">
        <div class="right_a1" @click="click_title_course(link.id)">
          <router-link to="" class="right_a1_a" :id="link.id">{{
            link.name.slice(0, 4)
          }}</router-link>
        </div>
      </div>
      <div class="right_more">
        <router-link :to="link_more.link_more">更多+</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index_center_title",
  data() {
    return {
      title_img_link: { play_video: require("../../img/视频播放.png") },
      link_more: {
        link_more: "/plan"
      },
      links: []
    };
  },
  created() {},
  methods: {
    click_title_course: function(id) {
      this.$store.state.click_index_courseid = id;
      console.log(id);
    }
  }
};
</script>
<style scoped>
.index_center_title {
  width: 1180px;
  height: 80px;
  /*background: #f2f2f2;*/
  margin: auto;
  /*background: blueviolet;*/
}

.index_center_title .title_left {
  height: 50px;
  width: 160px;
  /*background: #ac0000;*/
  display: flex;
  margin: 15px 0px 0px 15px;
  float: left;
}

.index_center_title .title_left h1 {
  font-size: 30px;
}

.index_center_title .title_right {
  height: 50px;
  width: 698px;
  /*background: #0be2fe;*/
  display: flex;
  margin-top: 15px;
  float: right;
  text-align: center;
  padding-top: 10px;
  /*background: red;*/
}
.index_center_title .right {
  height: 50px;
  /*background: #0be2fe;*/
  display: flex;
  float: right;
  text-align: center;
  padding-top: 10px;
  /*background: aquamarine;*/
}
.index_center_title .right .right_a1 {
  height: 20px;
  width: 100px;
  border-top: none;
  border-left: none;
  border-right: #7b7b7b 2px solid;
  border-bottom: none;
  text-align: center;
  text-decoration: none;
}

.index_center_title .title_right .right_more {
  height: 20px;
  width: 100px;
  text-align: center;
  text-decoration: none;
  margin-top: 10px;
  /*margin-right: 10px;*/
  /*background: aqua;*/
}

.index_center_title .title_right .right_more a {
  text-decoration: none;
  color: #919191;
}

.index_center_title .right .right_a1 a {
  text-decoration: none;
  color: #919191;
}
</style>
