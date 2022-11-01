<template>
  <div>
    <el-input
      type="textarea"
      :rows="2"
      placeholder="谈谈您的感想..."
      maxlength="150"
      show-word-limit
      v-model="textarea"
    >
    </el-input>
    <el-button class="submit" @click="addComment">发表评论</el-button>
  </div>
</template>

<script>
import { addCommont } from "../../network/course";
export default {
  name: "CourseComment",
  data() {
    return {
      username: "",
      textarea: ""
    };
  },
  methods: {
    addComment() {
      if (localStorage.getItem("token")) {
        this.username = localStorage.getItem("userName");
        this.pic = localStorage.getItem("pic");
        if (this.textarea == "") {
          this.$message.error("请填写评论留言！");
        } else {
          addCommont({
            courseId: window.location.href.split("=")[1],
            pic: this.pic,
            username: this.username,
            userId: localStorage.getItem("userId"),
            comment: this.textarea,
            coursePic: JSON.parse(sessionStorage.getItem("arr"))[0].pic,
            courseName: JSON.parse(sessionStorage.getItem("arr"))[0].course_name
          }).then(res => {
            // console.log(res);
            this.bus.$emit("addComment", {
              pic: this.pic,
              username: this.username,
              comment: this.textarea
            });
            this.textarea = "";
            console.log(JSON.parse(sessionStorage.getItem("arr"))[0].pic);
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
.submit {
  float: right;
  margin-bottom: 10px;
}
</style>
