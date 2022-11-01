<template>
  <div>
    <div class="course_video" v-for="(item, index) in detailData" :key="index">
      <div class="left">
        <video
          :src="item.course_url"
          controls="controls"
          height="470"
          width="800"
        ></video>
        <el-row>
          <el-button class="like" @click="like"
            >{{ button_value }}({{ like_count }})</el-button
          >
          <el-button class="ping">评论({{ ping }})</el-button>
          <el-button class="addTrain" @click="open(item.courseId)">{{
            buttonCollect
          }}</el-button>
        </el-row>
        <el-tabs type="border-card" class="list">
          <el-tab-pane>
            <span slot="label"> 第{{ item.courseId }}个动作</span>
            <video :src="item.course_url" width="160px" height="130px"></video>
          </el-tab-pane>
        </el-tabs>
      </div>
      <div class="right"><course-intro></course-intro></div>
      <div class="moment">
        <p>课程评价</p>
        <el-divider></el-divider>
        <course-comment></course-comment>
        <p class="excel">精彩评论</p>
        <el-divider></el-divider>
      </div>

      <div class="othercomment_container">
        <div
          class="other_comments"
          v-for="(item, index) in commentData"
          :key="index"
        >
          <div class="head">
            <img
              :src="require('../img/portrait/' + item.pic + '.jpg')"
              alt=""
            />
          </div>
          <h5>{{ item.username }}:</h5>
          <div class="review">
            <p>
              {{ item.comment }}<span>{{ item.comment.length + "/150" }}</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
import courseIntro from "./course/courseIntro";
import courseComment from "./course/CourseComment";
import {
  course,
  getCommont,
  addClasses,
  deleteClasses,
  dbClasses
} from "../network/course";
export default {
  name: "CourseDetail",
  components: {
    "course-intro": courseIntro,
    "course-comment": courseComment
  },
  data() {
    return {
      detailData: [],
      like_count: 10,
      flag: true,
      ping: 0,
      buttonCollect: "收藏课程",
      button_value: "点赞",
      username: "",
      textarea: "",
      commentData: []
    };
  },

  mounted() {
    this.bus.$on("addComment", comment => {
      this.commentData.unshift(comment);
      this.ping++;
    });
  },
  created() {
    course().then(res => {
      for (let item of res.data) {
        if (item.courseId == window.location.href.split("=")[1]) {
          this.detailData.push(item);
        }
      }

      dbClasses({
        courseId: this.detailData[0].courseId
      }).then(res => {
        if (res.code == 1) {
          for (let item of res.data) {
            console.log(item.userId);
            if (item.userId == localStorage.getItem("userId")) {
              this.buttonCollect = "取消收藏";
            }
          }
        } else {
          this.buttonCollect = "收藏课程";
        }
      });
    });

    getCommont().then(res => {
      for (let item of res.data) {
        if (item.courseId == window.location.href.split("=")[1]) {
          this.commentData.push(item);
          this.ping = this.commentData.length;
        }
      }
      // this.commentData = res.data;
      for (let item of this.commentData) {
        console.log(item.pic);
        if (item.pic == "") {
          item.pic = "user2";
        }
      }
    });
  },
  methods: {
    like: function() {
      if (this.flag) {
        this.like_count++;
        this.flag = false;
        this.button_value = "已赞";
      } else {
        this.like_count--;
        this.flag = true;
        this.button_value = "点赞";
      }
    },
    open(courseId) {
      if (localStorage.getItem("token")) {
        if (this.buttonCollect == "取消收藏") {
          this.buttonCollect = "收藏课程";
          this.$alert("已取消收藏！", "", {
            confirmButtonText: "确定"
          });
          deleteClasses({ courseId }).then(res => {
            console.log(res);
          });
        } else {
          this.buttonCollect = "取消收藏";
          this.$alert("已加入收藏！", "", {
            confirmButtonText: "确定"
          });
          addClasses({
            courseId: courseId,
            username: localStorage.getItem("userName"),
            userId: localStorage.getItem("userId"),
            course_name: this.detailData[0].course_name,
            course_pic: this.detailData[0].pic,
            course_inst: this.detailData[0].course_inst,
            course_type: this.detailData[0].course_type,
            course_part: this.detailData[0].course_part
          }).then(res => {
            console.log(res);
          });
        }
      } else {
        this.$alert("请登陆后在执行操作");
      }
    }
  }
};
</script>

<style scoped>
.list {
  margin-top: 20px;
}
.course_video {
  width: 1180px;
  height: 800px;
  /*background: #202023;*/
  margin: auto;
  margin-top: 20px;
}
.like {
  width: 100px;
  height: 30px;
  line-height: 6px;
}
.submit {
  float: right;
  margin-bottom: 10px;
}
.ping {
  width: 100px;
  height: 30px;
  line-height: 6px;
}
.course_video .left {
  width: 68%;
  height: 500px;
  float: left;
  background: #f2f2f2;
}
.course_video .right {
  width: 31%;
  height: 800px;
  float: right;
  background: #f2f2f2;

  /*box-shadow: 0 0 1px #949182;*/
}
.left .addTrain {
  width: 100px;
  height: 40px;
  background: #ff7160;
  float: right;
  font-size: 16px;
  color: #343434;
  text-align: center;
}
.left .addTrain:hover {
  background: red;
  color: #202023;
}
.excel {
  margin-top: 30px;
}
.moment {
  width: 68%;
  float: left;
  /*background: #edeada;*/
  margin-top: 260px;
}

.moment p {
  margin-bottom: 5px;
}

.othercomment_container {
  width: 68%;
  /*margin: auto;*/
  float: left;
}
.other_comments {
  width: 100%;
  height: 80px;
  border: 1px solid rgba(209, 194, 194, 0.1);
  background: white;
  padding-top: 10px;
  margin-bottom: 20px;
}
.head {
  width: 80px;
  height: 80px;
  float: left;
}

.head img {
  width: 70px;
  height: 70px;
  border-radius: 50%;
}
.review {
  position: relative;
  float: left;
  top: 10px;
  width: 600px;
  height: 60px;
  font-size: 14px;
  /*border: 1px solid rgba(0,0,0,0.31);*/
}
.review p {
  position: absolute;
  width: 700px;
  /*left: 10px;*/
  /*top: 0;*/
}
.review span {
  position: absolute;
  left: 664px;
  top: 31px;
}
</style>
