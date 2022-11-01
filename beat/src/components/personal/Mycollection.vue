<template>
  <div class="course" style="display: flex;flex-wrap: wrap;">
    <div v-for="(item, index) in collectionClasses" :key="index">
      <div class="course_part">
        <router-link
          :to="{ name: 'coursedetail', query: { id: item.courseId } }"
        >
          <div class="course_show">
            <img
              :src="require('../../img/course/' + item.course_pic + '.jpg')"
              height="191"
              width="325"
            />
          </div>
          <p>
            <strong>{{ item.course_name }}</strong>
          </p>
        </router-link>
        <p>
          <span>{{ item.course_inst }}</span>
          <span>{{ item.course_type }}</span>
          <span>{{ item.course_part }}</span>
        </p>
        <div class="del_col">
          <el-button
            type="text"
            class="button"
            @click="delClasses(item.courseId)"
            >删除</el-button
          >
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { getClasses, deleteClasses } from "../../network/course";
export default {
  name: "Mycollection",
  data() {
    return {
      Info: {},
      collectionClasses: []
    };
  },

  components: {},
  created() {
    getClasses({
      userId: localStorage.getItem("userId")
    }).then(res => {
      // console.log(res);
      if (res.code == 1) {
        this.collectionClasses = res.data;
      }
    });
  },
  methods: {
    delClasses(courseId) {
      deleteClasses({ courseId }).then(res => {
        console.log(res);
      });
      let index = this.collectionClasses.findIndex(
        ele => ele.courseId === courseId
      );
      console.log(index);
      if (index === -1) {
        return console.log("error");
      } else {
        this.collectionClasses.splice(index, 1);
      }
    }
    // getCourse(id) {
    //   this.$router.push("/coursedetail?id=" + id);
    // },
  }
};
</script>

<style scoped>
.course_part {
  /* height: 230.4px; */
  /* background: white; */
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: 0.5s;
  margin-left: 8px;
}

.course_part .course_show {
  padding-top: 5px;
}

.course_part .course_show:hover {
  box-shadow: 0px 0px 15px gray;
}

a {
  text-decoration: none;
  color: black;
}
span {
  font-family: "SimHei";
}
.del_col {
  float: right;
  margin-top: -25px;
}
.del_col .button:hover {
  color: red;
}
.course {
  min-height: 420px;
}
</style>
