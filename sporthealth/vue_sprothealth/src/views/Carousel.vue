<template>
  <div>
    <!-- <el-button icon="el-icon-circle-plus" size="small" class="addCase"
			>添加</el-button
		> -->
    <el-table
      ref="multipleTable"
      tooltip-effect="dark"
      style="width: 100%"
      :data="carouselData"
      :cell-style="{ textAlign: 'center' }"
      :header-cell-style="{ textAlign: 'center' }"
    >
      <el-table-column type="index" width="100" label="序号" align="center" />
      <el-table-column label="图片" width="260">
        <template slot-scope="scope">
          <el-upload
            class="avatar-uploader"
            action=""
            :auto-upload="false"
            :show-file-list="false"
            :on-change="handleChange"
          >
            <el-image
              v-if="scope.row.imgSrc"
              :src="require('@/img/carousel/' + scope.row.imgSrc + '.jpg')"
              style="width: auto; height: 100px"
              @click="getTableUploadIndex(scope.$index)"
            />
            <el-button
              size="small"
              type="primary"
              @click="getTableUploadIndex(scope.$index)"
              v-else
              >点击上传</el-button
            >
          </el-upload>
        </template>
      </el-table-column>
      <el-table-column prop="imgSrc" label="图片名"> </el-table-column>
      <el-table-column label="操作" width="200" fixed="right">
        <template slot="header" slot-scope="scope">
          <div class="table-header">
            <!-- <span>操作</span> -->
            <el-button type="text" @click="add(scope.row)"
              ><i class="el-icon-plus table-operation-icon"></i
            ></el-button>
          </div>
        </template>
        <template slot-scope="scope">
          <el-button
            type="danger"
            icon="el-icon-delete"
            circle
            @click="handleDelete(scope.row)"
          ></el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
import { getCarousel, addCarousel, delCarousel } from "@/network/user.js";
export default {
  data () {
    return {
      carouselData: [],
      imgUrl: "",
      tableUploadIndex: 0,
    };
  },
  created () {
    this.getCarouselList();
  },
  methods: {
    getCarouselList () {
      getCarousel().then((res) => {
        // console.log(res);
        this.carouselData = res.data;
      });
    },
    getTableUploadIndex (index) {
      // 获取点击上传文件的index
      this.tableUploadIndex = index;
    },
    handleChange (file) {
      console.log("this.tableUploadIndex", this.tableUploadIndex, file);
      this.imgUrl = file.name.slice(0, -4);
      addCarousel({
        imgSrc: this.imgUrl,
      }).then((res) => {
        this.getCarouselList();
        this.$message({
          message: "添加成功！！！",
          type: "success",
        });
      });
      // this.$router.go(0);
    },
    add () {
      // 添加行
      this.carouselData.push({ imgSrc: "" });
    },
    handleDelete (row) {
      this.$confirm("是否确认删除该轮播图", "警告", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
      })
        .then(function () {
          return delCarousel({ id: row.id });
        })
        .then(() => {
          this.getCarouselList();
          // this.msgSuccess("删除成功！");
          this.$message({
            message: "删除成功！！！",
            type: "success",
          });
        })
        .catch(() => { });
      // delCarousel({ id: row.id }).then((res) => {
      // 	this.getCarouselList();
      // });
    },
  },
};
</script>

<style scoped lang="less">
.caseData {
  margin-top: 30px;
  position: relative;
  .addCase {
    position: absolute;
    right: 0;
  }
}

.el-input {
  width: 400px;
}

.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
</style>
