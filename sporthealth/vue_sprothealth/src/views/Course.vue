<template>
  <div>
    <el-input
      placeholder="请输入课程关键字进行查找"
      type="text"
      size="small"
      v-model="searchText"
    >
    </el-input>
    <el-button type="info" icon="el-icon-search" size="mini" @click="searchBtn"
      >搜索</el-button
    >
    <el-button
      icon="el-icon-circle-plus"
      class="addCase"
      size="small"
      @click="dialogFormVisible = true"
      >添加</el-button
    >

    <el-table
      ref="multipleTable"
      tooltip-effect="dark"
      style="width: 100%"
      :data="schArr"
      :cell-style="{ textAlign: 'center' }"
      :header-cell-style="{ textAlign: 'center' }"
    >
      <el-table-column label="图片" width="220">
        <template slot-scope="scope">
          <img
            :src="require('@/img/course/' + scope.row.pic + '.jpg')"
            height="140px"
          />
        </template>
      </el-table-column>
      <el-table-column prop="course_name" label="课程名" show-overflow-tooltip>
      </el-table-column>
      <el-table-column prop="course_url" label="课程链接" show-overflow-tooltip>
      </el-table-column>
      <el-table-column prop="course_aim" label="课程目的" width="80">
      </el-table-column>
      <el-table-column prop="course_inst" label="课程等级" width="80">
      </el-table-column>
      <el-table-column prop="course_type" label="课程类型" width="100">
      </el-table-column>
      <el-table-column prop="course_part" label="训练部位" width="80">
      </el-table-column>
      <el-table-column prop="course_burn" label="燃烧热量" width="80">
      </el-table-column>
      <el-table-column prop="course_time" label="课程时长" width="80">
      </el-table-column>
      <el-table-column prop="degree" label="次数" width="80"> </el-table-column>
      <el-table-column
        prop="course_intro"
        label="课程介绍"
        show-overflow-tooltip
      >
      </el-table-column>
      <el-table-column prop="operate" label="操作" width="120" fixed="right">
        <template slot-scope="scope">
          <el-button
            type="danger"
            icon="el-icon-delete"
            circle
            @click="deleteSelection(scope.row)"
          ></el-button>
          <el-button
            type="primary"
            icon="el-icon-edit"
            circle
            @click="editCourse(scope.row.courseId)"
          >
          </el-button>
        </template>
      </el-table-column>
    </el-table>

    <!-- 分页 -->
    <el-pagination
      @size-change="handleSizeChange"
      @current-change="handleCurrentChange"
      :current-page="currentPage"
      :page-sizes="[1, 2, 3, 4]"
      :page-size="pagesize"
      layout="total, sizes, prev, pager, next, jumper"
      :total="courseData.length"
    >
    </el-pagination>

    <el-dialog title="特色课程" :visible.sync="dialogFormVisible">
      <el-upload
        action=" "
        list-type="picture-card"
        :on-preview="handlePictureCardPreview"
        :on-remove="handleRemove"
        :auto-upload="false"
        :on-change="handleChange"
        ref="upload"
      >
        <i class="el-icon-plus"></i>
      </el-upload>
      <el-form :model="form" ref="form">
        <el-form-item
          label="课程名"
          prop="course_name"
          :label-width="formLabelWidth"
        >
          <el-input v-model="form.course_name" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item
          label="课程链接"
          prop="course_url"
          :label-width="formLabelWidth"
        >
          <el-input
            v-model="form.course_url"
            autocomplete="off"
            type="textarea"
          ></el-input>
        </el-form-item>
        <el-form-item
          label="课程目的"
          prop="course_aim"
          :label-width="formLabelWidth"
        >
          <el-select v-model="form.course_aim" placeholder="请选择课程目的">
            <el-option label="增肌" value="增肌"></el-option>
            <el-option label="减脂" value="减脂"></el-option>
            <el-option label="塑形" value="塑形"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item
          label="课程等级"
          prop="course_inst"
          :label-width="formLabelWidth"
        >
          <el-select v-model="form.course_inst" placeholder="请选择课程等级">
            <el-option label="H1" value="H1"></el-option>
            <el-option label="H2" value="H2"></el-option>
            <el-option label="H3" value="H3"></el-option>
            <el-option label="H4" value="H4"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item
          label="动作类型"
          prop="course_type"
          :label-width="formLabelWidth"
        >
          <el-select v-model="form.course_type" placeholder="请选择动作类型">
            <el-option label="徒手训练" value="徒手训练"></el-option>
            <el-option label="器械训练" value="器械训练"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item
          label="训练部位"
          prop="course_part"
          :label-width="formLabelWidth"
        >
          <el-select v-model="form.course_part" placeholder="请选择训练部位">
            <el-option label="胸部" value="胸部"></el-option>
            <el-option label="腹部" value="腹部"></el-option>
            <el-option label="腿部" value="腿部"></el-option>
            <el-option label="全身" value="全身"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item
          label="燃烧卡路里"
          prop="course_burn"
          :label-width="formLabelWidth"
        >
          <el-input v-model="form.course_burn" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item
          label="课时长"
          prop="course_time"
          :label-width="formLabelWidth"
        >
          <el-input v-model="form.course_time" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="次数" prop="degree" :label-width="formLabelWidth">
          <el-select v-model="form.degree" placeholder="请选择训练次数">
            <el-option label="3" value="3"></el-option>
            <el-option label="5" value="5"></el-option>
            <el-option label="7" value="7"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item
          label="课程介绍"
          prop="course_intro"
          :label-width="formLabelWidth"
        >
          <el-input
            v-model="form.course_intro"
            autocomplete="off"
            type="textarea"
          ></el-input>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="ascertain('form')">确 定</el-button>
      </div>
    </el-dialog>

    <el-dialog title="特色课程" :visible.sync="dialogFormVisible1">
      <img
        :src="require('@/img/course/' + editForm.imgUrl + '.jpg')"
        width="200px"
        v-if="show"
      />
      <el-button @click="deleteImg" v-if="show">删除</el-button>
      <el-upload
        action=" "
        list-type="picture-card"
        :on-preview="handlePictureCardPreview"
        :on-remove="handleRemove"
        :auto-upload="false"
        :on-change="handleChange"
        v-if="show1"
        ref="upload"
      >
        <i class="el-icon-plus"></i>
      </el-upload>
      <el-form :model="editForm">
        <el-form-item label="课程名" :label-width="formLabelWidth">
          <el-input
            v-model="editForm.course_name"
            autocomplete="off"
          ></el-input>
        </el-form-item>
        <el-form-item label="课程链接" :label-width="formLabelWidth">
          <el-input
            v-model="editForm.course_url"
            autocomplete="off"
            type="textarea"
          ></el-input>
        </el-form-item>
        <el-form-item label="课程目的" :label-width="formLabelWidth">
          <el-select v-model="editForm.course_aim" placeholder="请选择课程目的">
            <el-option label="增肌" value="增肌"></el-option>
            <el-option label="减脂" value="减脂"></el-option>
            <el-option label="塑形" value="塑形"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="课程等级" :label-width="formLabelWidth">
          <el-select
            v-model="editForm.course_inst"
            placeholder="请选择课程等级"
          >
            <el-option label="H1" value="H1"></el-option>
            <el-option label="H2" value="H2"></el-option>
            <el-option label="H3" value="H3"></el-option>
            <el-option label="H4" value="H4"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="动作类型" :label-width="formLabelWidth">
          <el-select
            v-model="editForm.course_type"
            placeholder="请选择动作类型"
          >
            <el-option label="徒手训练" value="徒手训练"></el-option>
            <el-option label="器械训练" value="器械训练"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="训练部位" :label-width="formLabelWidth">
          <el-select
            v-model="editForm.course_part"
            placeholder="请选择训练部位"
          >
            <el-option label="胸部" value="胸部"></el-option>
            <el-option label="腹部" value="腹部"></el-option>
            <el-option label="腿部" value="腿部"></el-option>
            <el-option label="全身" value="全身"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="燃烧卡路里" :label-width="formLabelWidth">
          <el-input
            v-model="editForm.course_burn"
            autocomplete="off"
          ></el-input>
        </el-form-item>
        <el-form-item label="课时长" :label-width="formLabelWidth">
          <el-input
            v-model="editForm.course_time"
            autocomplete="off"
          ></el-input>
        </el-form-item>
        <el-form-item label="次数" :label-width="formLabelWidth">
          <el-select v-model="editForm.degree" placeholder="请选择训练次数">
            <el-option label="3" value="3"></el-option>
            <el-option label="5" value="5"></el-option>
            <el-option label="7" value="7"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="课程介绍" :label-width="formLabelWidth">
          <el-input
            v-model="editForm.course_intro"
            autocomplete="off"
            type="textarea"
          ></el-input>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible1 = false">取 消</el-button>
        <el-button type="primary" @click="ascertain1">确 定</el-button>
      </div>
    </el-dialog>
  </div>
</template>

<script>
import {
  course,
  deleteSc,
  addCourse,
  updateCourse,
  search,
} from "@/network/course.js";
export default {
  data () {
    return {
      courseData: [],
      searchText: "",
      dialogFormVisible: false,
      dialogFormVisible1: false,
      show: true,
      show1: false,
      imgUrl: "",
      imageUrl: "",
      form: {
        course_name: "",
        course_url: "",
        course_aim: "",
        course_inst: "",
        course_type: "",
        course_part: "",
        course_burn: "",
        course_time: "",
        degree: "",
        course_intro: "",
      },
      editForm: {
        courseId: "",
        imgUrl: "腹肌撕裂者初级",
        course_name: "",
        course_url: "",
        course_aim: "",
        course_inst: "",
        course_type: "",
        course_part: "",
        course_burn: "",
        course_time: "",
        degree: "",
        course_intro: "",
      },
      formLabelWidth: "120px",
      schArr: [],
      total: 0,
      currentPage: 1,
      pagesize: 3,
    };
  },
  methods: {
    getPageDataList () {
      course().then((res) => {
        this.courseData = res.data;
        this.getPageData();
      });
    },
    deleteSelection (row) {
      this.$confirm(`确定删除标题为${row.course_name}的数据吗？`, "警告", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
      })
        .then(function () {
          return deleteSc({ id: row.courseId });
        })
        .then(() => {
          this.getPageDataList();
          this.$message({
            message: "删除成功！！！",
            type: "success",
          });
        })
        .catch(() => { });
      // deleteSc({
      // 	id: id,
      // }).then((res) => {
      // 	this.$message({
      // 		message: "删除成功！！！",
      // 		type: "success",
      // 	});
      // });
      // let index = this.courseData.findIndex((ele) => ele.courseId === id);
      // console.log(index);
      // if (index === -1) {
      // 	return console.log("error");
      // } else {
      // 	this.courseData.splice(index, 1);
      // 	this.getPageData();
      // }
    },
    handleRemove (file, fileList) {
      console.log(file, fileList);
    },
    handlePictureCardPreview (file) {
      this.dialogImageUrl = file.url;
      this.dialogVisible = true;
    },
    handleChange (file) {
      this.imgUrl = file.name.slice(0, -4);
    },
    ascertain (formName) {
      if (
        this.form.course_name == "" ||
        this.form.course_url == "" ||
        this.form.course_aim == "" ||
        this.form.course_inst == "" ||
        this.form.course_type == "" ||
        this.form.course_part == "" ||
        this.form.course_burn == "" ||
        this.form.course_time == "" ||
        this.form.degree == "" ||
        this.form.course_intro == ""
      ) {
        this.$message.error("请全填写好在提交");
      } else {
        addCourse({
          url: this.imgUrl,
          name: this.form.course_name,
          course_url: this.form.course_url,
          aim: this.form.course_aim,
          inst: this.form.course_inst,
          type: this.form.course_type,
          part: this.form.course_part,
          burn: this.form.course_burn,
          time: this.form.course_time,
          degree: this.form.degree,
          intro: this.form.course_intro,
        }).then((res) => {
          this.getPageDataList();
          this.$message({
            message: "添加成功！！！",
            type: "success",
          });
        });
        this.dialogFormVisible = false;
        this.$refs[formName].resetFields();
        this.$refs.upload.clearFiles();
      }
    },
    deleteImg () {
      this.show = !this.show;
      this.show1 = !this.show1;
    },
    editCourse (id) {
      this.editForm.courseId = id;
      for (let item of this.courseData) {
        if (item.courseId == id) {
          console.log(item);
          this.editForm.imgUrl = item.pic;
          this.editForm.course_name = item.course_name;
          this.editForm.course_url = item.course_url;
          this.editForm.course_aim = item.course_aim;
          this.editForm.course_inst = item.course_inst;
          this.editForm.course_type = item.course_type;
          this.editForm.course_part = item.course_part;
          this.editForm.course_burn = item.course_burn;
          this.editForm.course_time = item.course_time;
          this.editForm.degree = item.degree;
          this.editForm.course_intro = item.course_intro;
        }
      }
      this.dialogFormVisible1 = true;
    },
    ascertain1 () {
      updateCourse({
        id: this.editForm.courseId,
        url: this.imgUrl == "" ? this.editForm.imgUrl : this.imgUrl,
        name: this.editForm.course_name,
        course_url: this.editForm.course_url,
        aim: this.editForm.course_aim,
        inst: this.editForm.course_inst,
        type: this.editForm.course_type,
        part: this.editForm.course_part,
        burn: this.editForm.course_burn,
        time: this.editForm.course_time,
        degree: this.editForm.degree,
        intro: this.editForm.course_intro,
      }).then((res) => {
        // console.log(res);
        this.$message.success("修改成功");
        this.getPageDataList();
        this.dialogFormVisible1 = false;
        this.$refs.upload.clearFiles();
        this.imgUrl = "";
        this.deleteImg();
      });
    },
    searchBtn () {
      search({
        value: this.searchText,
      }).then((res) => {
        if (this.searchText == "") {
          this.$router.go(0);
        } else {
          console.log(res);
          this.schArr = res.data;
        }
      });
    },

    // 分页处理将需要展示数组对象放入schArr新数组中
    getPageData () {
      let start = (this.currentPage - 1) * this.pagesize;
      let end = start + this.pagesize;
      this.schArr = this.courseData.slice(start, end);
    },

    // element分页自带属性
    handleSizeChange (val) {
      this.pagesize = val;
      this.getPageData();
    },
    handleCurrentChange (val) {
      this.currentPage = val;
      this.getPageData();
    },
  },
  created () {
    this.getPageDataList();
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
