<template>
  <div class="timer">
    <el-button
      class="daka"
      type="primary"
      :disabled="check || this.meg == '已打卡'"
      @click="punch"
    >
      <span class="timer-main" ref="startTimer"></span>{{ max_time }}
      <p>{{ meg }}</p>
    </el-button>
  </div>
</template>
<script>
export default {
  name: "Timer",
  data() {
    // return {
    //   timer: "",
    //   content: "",
    //   minutes: 0,
    //   seconds: 0,
    //   max_time: "/01:00",
    //   check: true,
    //   meg: "点击打卡！"
    // }
  },
  created() {
    // console.log(this.$store.state.richeng_id, "aaa");
    // var this_ = this;
    // this.timer = setInterval(this.startTimer, 1000);
    // if (localStorage.getItem("token")) {
    //   this_.$axios
    //     .get("http://127.0.0.1:8080/traning/check_jihua", {
    //       params: {
    //         jihua_id: this_.$store.state.click_index_planid,
    //         id: localStorage.getItem("id")
    //       }
    //     })
    //     .then(function(response) {
    //       if (response.data.code == "1050") {
    //         this_.$axios
    //           .get("http://127.0.0.1:8080/traning/check_punch", {
    //             params: {
    //               richeng_id: this_.$store.state.richeng_id,
    //               id: localStorage.getItem("id"),
    //               user_traning_id: response.data.id
    //             }
    //           })
    //           .then(function(response) {
    //             if (response.data.code == "1052") {
    //               this_.meg = "已打卡";
    //             } else {
    //             }
    //           });
    //       }
    //     });
    // }
  },
  destroyed() {
    // clearInterval(this.timer);
  },
  methods: {
    // startTimer() {
    //   this.seconds += 1;
    //   if (this.seconds >= 5) {
    //     this.seconds = 0;
    //     this.minutes = this.minutes + 1;
    //   }
    //   if (this.minutes == 1) {
    //     this.check = false;
    //   }
    //   if (this.minutes >= 60) {
    //     this.minutes = 0;
    //   }
    //   this.$refs.startTimer.innerHTML =
    //     (this.minutes < 10 ? "0" + this.minutes : this.minutes) +
    //     ":" +
    //     (this.seconds < 10 ? "0" + this.seconds : this.seconds);
    // },
    // punch: function() {
    //   var this_ = this;
    //   if (localStorage.getItem("token")) {
    //     this_.$axios
    //       .get("http://127.0.0.1:8080/traning/check_jihua", {
    //         params: {
    //           jihua_id: this_.$store.state.click_index_planid,
    //           id: localStorage.getItem("id")
    //         }
    //       })
    //       .then(function(response) {
    //         if (response.data.code == "1050") {
    //           this_.$axios
    //             .get("http://127.0.0.1:8080/traning/punch", {
    //               params: {
    //                 richeng_id: this_.$store.state.richeng_id,
    //                 id: localStorage.getItem("id"),
    //                 user_traning_id: response.data.id
    //               }
    //             })
    //             .then(function(response) {
    //               if (response.data.code == "1053") {
    //                 console.log(response.data);
    //                 this_.meg = "已打卡";
    //                 this_.$alert("打卡成功！", "", {
    //                   confirmButtonText: "确定"
    //                 });
    //               } else {
    //                 this_.$alert("打卡失败！", "", {
    //                   confirmButtonText: "确定"
    //                 });
    //               }
    //             });
    //         } else {
    //           this_.$alert("请宁先加入计划!", "", {
    //             confirmButtonText: "确定"
    //           });
    //         }
    //       });
    //   } else {
    //     this_.$alert("宁为什么还不登陆？", "", {
    //       confirmButtonText: "确定"
    //     });
    //   }
    // }
  }
};
</script>
<style scoped>
.timer .daka {
  width: 100px;
  height: 64px;

  border-radius: 5px;
  color: white;
  padding-left: 8px;
  font-family: "Helvetica Neue";
}

.timer .daka p {
  font-size: 16px;
  margin-left: 4px;
  margin-top: 4px;
}

.timer-main {
  color: white;
  box-sizing: content-box;
  font-family: "Helvetica Neue";
}
</style>
