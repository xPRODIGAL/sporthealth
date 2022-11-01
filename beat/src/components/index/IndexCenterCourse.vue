<template>
  <!--特色课程-->
  <div class="course">
    <div class="cs_title">
      <h3>名人课程</h3>
      <router-link :to="index_course_link_more.index_course_link_more"
        >更多+</router-link
      >
    </div>
    <div class="cs_content" id="cs_content">
      <div
        class="video"
        v-for="video in v_router_link"
        @click="click_course(video.id)"
      >
        <router-link to="" :id="video.id">
          <img
            class="video_img"
            :src="video.picture"
            alt=""
            width="380px"
            height="355px"
          />
        </router-link>
        <div class="video_title">
          <router-link class="video_title" to="">{{ video.name }}</router-link>
          {{ $store.state.click_courseid }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index_center_course",
  data() {
    return {
      index_course_link_more: {
        index_course_link_more: "/course"
      },
      v_router_link: [],
      coursedetail: "/coursedetail"
    };
  },
  created() {},

  methods: {
    click_course: function(id) {
      this.$store.state.courseid = id;
      console.log(id);
      this.$router.push("/coursedetail");
    }
  }
};
</script>
<style scoped>
.course {
  width: 1180px;
  margin: auto;
}

.course .cs_title {
  width: 1180px;
  height: 50px;
  /*background: #c1e7ec;*/
  text-align: center;
  border-top: #919191 solid 2px;
  padding-top: 15px;
}

.course .cs_title h3 {
  display: block;
  /*width: 500px;*/
  /*height: 50px;*/
  /*background: #872fec;*/
  float: left;
  margin-left: 55px;
  /*border-left:#ff6164 solid 2px ;*/
  font-size: 24px;
  line-height: 50px;
}

.course .cs_title a {
  /*width: 500px;*/
  /*height: 50px;*/
  /*background: #ec8460;*/
  float: right;

  text-decoration: none;
  line-height: 50px;
  color: #919191;
  display: block;
  margin-right: 20px;
}

.course .cs_content {
  width: 1180px;
  /*background: #c1e7ec;*/
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.cs_content .video {
  height: 190px;
  width: 380px;
  /*background: url("https://w2.dwstatic.com/yy/ojiastoreimage/f09067c89921f6cdaf7c3c7f7b7d70c8.jpg?imageview/format/webp");*/
  overflow: hidden;
  margin-top: 25px;
  margin-bottom: 5px;
  box-sizing: border-box;
  /*解决抖动*/
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.cs_content .video img {
  position: relative;
  top: -50px;
}
.course .cs_content .video:hover {
  box-shadow: 0px 0px 10px gray;
  transform: translate(0px, 0px);
}

.course .cs_content .video .video_title {
  height: 40px;
  width: 380px;
  /*background: #d6d6d6;*/
  position: absolute;

  display: none;

  text-align: center;

  /*bottom: 40px;*/
  /*left: 10px;*/
}
.course .cs_content .video:hover .video_title {
  height: 40px;
  width: 380px;
  /*background: #d6d6d6;*/
  position: absolute;
  background: rgba(60, 60, 60, 0.55);
  display: block;
  bottom: 0px;
  left: 0px;
  text-align: center;
  /*缓慢出现*/
  animation: sport 300ms;
  transform: translateY(0px);

  /*bottom: 40px;*/
  /*left: 10px;*/
}
/*缓慢出现*/
@keyframes sport {
  0% {
    transform: translateY(80px);
    opacity: 1;
  }
  25% {
    transform: translateY(50px);
    opacity: 1;
  }
  50% {
    transform: translateY(20px);
    opacity: 1;
  }
  100% {
    transform: translateY(0px);
    opacity: 1;
  }
}
.course .cs_content .video .video_title a {
  text-decoration: none;
  font-size: 18px;
  color: whitesmoke;
}
</style>
