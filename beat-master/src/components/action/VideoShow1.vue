<template>
  <div>
    <div class="rongqi">
      <div class="action_part" v-for="(item, index) in schArr" :key="index">
        <div class="action_show" @click="get_actionid(item.actionId)">
          <img :src="require('../../img/action/' + item.pic + '.jpg')" />
        </div>
        <p>
          <strong>{{ item.action_name }}</strong>
        </p>
        <p class="info">
          <span
            >{{ item.action_type }} {{ item.action_inst }}
            {{ item.action_part }}</span
          >
        </p>
      </div>
    </div>

    <div class="videoShow_footer">
      <!-- 分页 -->
      <el-pagination
        background
        @size-change="handleSizeChange"
        @current-change="handleCurrentChange"
        :current-page.sync="currentPage"
        :page-size="pagesize"
        layout="total, prev, pager, next"
        :total="actionData.length"
      >
      </el-pagination>
    </div>
  </div>
</template>

<script>
import { action } from "../../network/action";
export default {
  name: "VideoShow",
  data() {
    return {
      actionData: [],
      schArr: [],
      currentPage: 1,
      pagesize: 8
    };
  },
  methods: {
    get_actionid(id) {
      // console.log(id);
      this.$router.push("/actiondetail?id=" + id);
    },

    getPageData() {
      let start = (this.currentPage - 1) * this.pagesize;
      let end = start + this.pagesize;
      this.schArr = this.actionData.slice(start, end);
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
  },
  mounted() {
    action().then(res => {
      // console.log(res);
      for (let item of res.data) {
        // console.log(item);
        if (item.action_type == "初级") {
          this.actionData.push(item);
          this.getPageData();
        }
      }
    });
  }
};
</script>

<style scoped>
.rongqi {
  width: 100%;
  height: 100%;
  display: flex;
  flex-wrap: wrap;
}
.action_part {
  background: white;
  width: 23%;
  margin-bottom: 30px;
  margin-right: 1%;
  padding: 0;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transition: 0.5s;
}
.action_show {
  width: 100%;
  height: 78%;
}
.action_part .action_show img {
  width: 100%;
  height: 100%;
}

.action_part p {
  padding-top: -5px;
}
.action_part:hover {
  box-shadow: 0px 0px 10px gray;
}
a {
  text-decoration: none;
  color: black;
  font-family: helvetica;
}
span {
  font-family: Arial, Helvetica, sans-serif;
}
.info {
  font-size: 12px;
}

.videoShow_footer {
  display: flex;
  justify-content: center;
}
</style>
