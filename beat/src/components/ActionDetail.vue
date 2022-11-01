<template>
  <div class="actiondetail">
    <div class="video-container"><video-main></video-main></div>
    <video-info></video-info>
    <!-- <div class="videocomment">
      <div class="comment">
        <video-comment></video-comment><el-button>提交评论</el-button>
      </div>
    </div>
    <div class="othercomment_container">
      <other-comment></other-comment>
    </div> -->
  </div>
</template>

<script>
import Video from "./action/actiondetal/Video";
import VideoInfo from "./action/actiondetal/VideoInfo";
import VideoComment from "./action/actiondetal/VideoComment";
import OtherComment from "./action/actiondetal/OtherComments";

export default {
  name: "ActionDetail",

  data() {
    return {};
  },
  components: {
    "video-main": Video,
    "video-info": VideoInfo,
    "video-comment": VideoComment,
    "other-comment": OtherComment
  }
};
</script>

<style scoped>
.actiondetail {
  padding-top: 30px;
}
.videocomment {
  width: 1000px;
  margin: auto;
  background: white;
}
.video-container {
  width: 1000px;
  margin: auto;
}
.comment {
  margin-top: 2px;
  width: 950px;
  margin: auto;
  display: flex;
}
span {
  font-size: 20px;
  margin-left: 20px;
  margin-top: 30px;
}
.el-button {
  font-size: 20px;
  background: #ed0c1c;
  color: black;
}
.el-button:hover {
  color: white;
}
.othercomment_container {
  width: 1000px;
  margin: auto;
}
</style>
