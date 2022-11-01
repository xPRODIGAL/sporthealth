<template>
  <div>
    <div class="container">
      <div
        class="course_part"
        v-for="(item, index) in schArr"
        :key="index"
        @click="getCourse(item.courseId)"
      >
        <img
          :src="require('../../img/course/' + item.pic + '.jpg')"
          height="220"
          width="375"
          alt=""
        />
        <div class="description">
          <h4>{{ item.course_name }}</h4>
          <div class="descriptions">
            <span>{{ item.course_inst }}</span
            >&nbsp; <span>{{ item.course_type }}</span
            ><br />
            <span class="persons">{{ item.course_part }}</span>
          </div>
        </div>
        <div class="mark"></div>
      </div>
    </div>
    <div class="footer">
      <!-- 分页 -->
      <el-pagination
        background
        @size-change="handleSizeChange"
        @current-change="handleCurrentChange"
        :current-page.sync="currentPage"
        :page-size="pagesize"
        layout="total, prev, pager, next"
        :total="courseData.length"
      >
      </el-pagination>
    </div>
  </div>
</template>

<script>
import { course } from "../../network/course";
export default {
  name: "CourseShow",
  data() {
    return {
      courseData: [],
      Arr: [],
      schArr: [],
      currentPage: 1,
      pagesize: 6
    };
  },
  created() {
    course().then(res => {
      // console.log(res);
      this.courseData = res.data;
      this.getPageData();
    });
  },
  methods: {
    getCourse(id) {
      console.log(id);
      this.$router.push("/coursedetail?id=" + id);
      for (let i of this.courseData) {
        if (i.courseId == id) {
          this.Arr.push(i);
        }
      }
      // console.log(this.Arr);
      window.sessionStorage.setItem("arr", JSON.stringify(this.Arr));
    },
    getPageData() {
      let start = (this.currentPage - 1) * this.pagesize;
      let end = start + this.pagesize;
      this.schArr = this.courseData.slice(start, end);
    },
    // element分页自带属性
    handleSizeChange(val) {
      this.pagesize = val;
      this.getPageData();
    },
    handleCurrentChange(val) {
      this.currentPage = val;
      this.getPageData();
    }
  }
};
</script>

<style scoped>
.container {
  display: flex;
  flex-wrap: wrap;
}
.course_part {
  background: white;
  width: 375px;
  height: 220px;
  margin-bottom: 30px;
  margin-right: 10px;
  padding: 0;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: 0.5s;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.course_part:hover {
  box-shadow: 0 0 6px gray;
  /*transform: translate(0px,-5px);*/
}
a {
  text-decoration: none;
  color: black;
}
.description h4 {
  position: absolute;
  z-index: 10;
  top: 40px;
  left: 30px;
  font-size: 24px;
  color: #fff9ea;
}
.description .descriptions {
  position: absolute;
  z-index: 10;
  top: 85px;
  left: 30px;
  font-size: 18px;
  color: #fff9ea;
}
.persons {
  font-size: 14px;
}
span {
  font-family: "SimHei";
}
.mark {
  /*background: darkgrey;*/
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: #464646;
  opacity: 0.4;
  filter: alpha(opacity=40);
  -webkit-transition: opacity ease 200ms;
  transition: opacity ease 200ms;
  z-index: 4;
  cursor: pointer;
}
.mark:hover {
  background-color: #878475;
  transition: 0.5s;
}

.footer {
  display: flex;
  justify-content: center;
}
</style>
