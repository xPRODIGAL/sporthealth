<template>
      <div class="traningdetail">
        <div class="traning-head"><head-main></head-main></div>
        <div class="traning-main">
          <div class="main-head">
            <span v-model="this.$store.state.course_name">{{$store.state.course_name}}</span>
            <el-button type="danger" @click="prev()">回到计划</el-button>
            <p v-model="this.$store.state.course_info">{{$store.state.course_info[0].shuoming}}</p>
          </div>
          <div class="main-body">
            <video-main></video-main>
            <div class="part">
            <traning-part></traning-part>
            </div>
          </div>
        </div>
        <div class="right"><traning-right></traning-right></div>
        <div class="timer_container"><timer-main></timer-main></div>

      </div>
</template>

<script>
  import DetailHead from "./plan/plandetail/DetailHead"
  import TraningRight from "./traning/TraningRight"
  import Video from "./traning/VideoForTraning"
  import TraningPart from "./traning/TraningPart"
  import Timer from "./traning/Timer"

    export default {
        name: "TraningMain",
      data(){
          return{

          }
      } ,components:{"head-main":DetailHead,"traning-right":TraningRight,"video-main":Video,"traning-part":TraningPart,"timer-main":Timer,}
      ,methods: {
        prev () {
          this.$router.push("/plandetail")
        }
      }
    }
</script>

<style scoped>
  .traningdetail{
    width: 100%;
    overflow: hidden;
  }
  .traning-main{
    width: 700px;
    margin-top: 20px;
    padding:4px 10px;

    margin-left:200px;
    overflow: hidden;
    float: left;
  }
  .right{
    float: left;
    margin-left: 100px;
  }
  .timer_container{
    float: left;
    margin-left: 20px;
    margin-top: 30px;
  }
  .main-head{
    padding-left: 20px;
    background: white;
  }
  .main-head span{
    height: 40px;
    line-height: 40px;
  }
  .part{
    margin-top: 10px;

  }

  .el-button{
    float: right;
  }
  .main-head p{
    font-size: 14px;
  }
  .daka{
    margin-right: 20px;
  }
</style>
