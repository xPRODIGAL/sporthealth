<template>
  <div class="index_video_div">
    <div class="index_video_play">
      <div class="index_video_above">
        <img src="../../img/beat_yourself.png" height="130" width="600" />
      </div>

      <div class="index_video_down">
        <video
          src="https://static1.gotokeep.com/homepage/5s.mp4"
          muted
          autoplay
          loop
          style="width: 1520px"
        ></video>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index_video_play"
};
</script>

<style scoped>
.index_video_div {
  width: 100%;
  margin: auto;
  /*background: #ed3a4a;*/
  padding: 0;
}
.index_video_play {
  height: 854.44px;
  width: 1519px;
  /*width: 100%;*/
  margin: auto;
  padding: 0;
  position: relative;
}
.index_video_down {
  width: 1519px;
  height: 854.44px;
  /*background: #ff6164;*/
  background-image: url("https://static1.gotokeep.com/homepage/5s.mp4");

  background-repeat: no-repeat;
}
.index_video_above {
  position: absolute;
  width: 1519px;
  height: 854.44px;

  /*background: #ed3a4a;*/
  background: rgba(34, 34, 34, 0.3);
  display: flex;
  justify-items: center;
}
.index_video_above img {
  display: block;

  margin: 240px auto;
}
</style>
