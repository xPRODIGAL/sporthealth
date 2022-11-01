<template>
  <div class="myComment_1">
    <div class="myComment" v-for="(item, index) in commentData" :key="index">
      <div class="myComment_picture">
        <router-link
          :to="{ name: 'coursedetail', query: { id: item.courseId } }"
        >
          <img
            class="myComment_picture_main"
            :src="require('../../img/course/' + item.coursePic + '.jpg')"
            height="151px"
            width="276px"
          />
        </router-link>
      </div>
      <div class="myComment_name">
        <h4 style="padding-top: 5px">课程名：{{ item.courseName }}</h4>
        <p>我的评论：{{ item.comment }}</p>
      </div>
      <div class="del_com">
        <p>
          <span>{{ item.comment.length + "/150" }}</span>
        </p>
        <el-button type="text" class="button" @click="delComment(item.id)"
          >删除评论</el-button
        >
      </div>
    </div>
  </div>
</template>

<script>
import { getCommont, deleteComment } from "../../network/course";
export default {
  name: "myComment",
  data() {
    return {
      seen: false,
      commentData: []
    };
  },
  created() {
    this.getCommentList();
  },
  methods: {
    // 获取评论列表
    getCommentList() {
      getCommont().then(res => {
        for (let item of res.data) {
          if (item.userId == window.localStorage.getItem("userId")) {
            this.commentData.push(item);
          }
        }
      });
    },

    // getCourse(id) {
    //   this.$router.push("/coursedetail?id=" + id);
    // },

    delComment(id) {
      deleteComment({ id }).then(res => {
        console.log(res);
      });
      let index = this.commentData.findIndex(ele => ele.id === id);
      console.log(index);
      if (index === -1) {
        return console.log("error");
      } else {
        this.commentData.splice(index, 1);
      }
    }
  }
};
</script>

<style scoped>
a {
  color: black;
}
.myComment {
  background: white;
  width: 100%;
  height: 160px;
  border-bottom: 1px solid gray;
  margin-bottom: 1px;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: 0.3s;
}
.myComment .myComment_picture {
  width: 300px;
  height: 160px;
  float: left;
  margin-right: 10px;
}
.myComment .myComment_picture img {
  margin-top: 8px;
  margin-left: 15px;
  width: 90%;
  height: 90%;
}
.del_com {
  float: right;
  width: 100px;
  margin-top: 60px;
  text-align: center;
}

.del_com .button:hover {
  color: red;
}
.myComment_1 {
  min-height: 400px;
}
</style>
