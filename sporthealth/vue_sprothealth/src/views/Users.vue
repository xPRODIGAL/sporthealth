<template>
  <div>
    <el-input
      placeholder="请输入用户名关键字进行查找"
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
      size="small"
      class="addCase"
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
      <el-table-column label="头像" width="180">
        <template slot-scope="scope">
          <img
            :src="require('@/img/portrait/' + scope.row.pic + '.jpg')"
            height="100"
          />
        </template>
      </el-table-column>
      <el-table-column prop="userName" label="用户名" width="180">
      </el-table-column>
      <el-table-column prop="email" label="邮箱" width="200"> </el-table-column>
      <el-table-column prop="sex" label="性别" width="120"> </el-table-column>
      <el-table-column prop="height" label="身高(cm)" width="120">
      </el-table-column>
      <el-table-column prop="weight" label="体重(kg)" width="120">
      </el-table-column>
      <el-table-column prop="aim" label="目标"> </el-table-column>
      <el-table-column prop="operate" label="操作" width="200">
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
            @click="editUser(scope.row)"
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
      :total="userData.length"
    >
    </el-pagination>

    <!-- 添加 -->
    <el-dialog title="添加用户" :visible.sync="dialogFormVisible">
      <div class="head-up">
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
      </div>
      <el-form :model="form" ref="form" :rules="rules">
        <el-form-item
          label="用户名"
          prop="userName"
          :label-width="formLabelWidth"
        >
          <el-input
            placeholder="请填写用户名"
            v-model="form.userName"
            autocomplete="off"
          ></el-input>
        </el-form-item>
        <el-form-item label="邮箱" prop="email" :label-width="formLabelWidth">
          <el-input
            placeholder="请输入邮箱"
            v-model="form.email"
            autocomplete="off"
          ></el-input>
        </el-form-item>
        <el-form-item
          label="密码"
          prop="password"
          :label-width="formLabelWidth"
        >
          <!-- <el-input v-model="form.password" autocomplete="off"></el-input> -->
          <el-input
            placeholder="请输入密码"
            v-model="form.password"
            show-password
          ></el-input>
        </el-form-item>
        <el-form-item
          label="请选择性别"
          prop="sex"
          :label-width="formLabelWidth"
        >
          <!-- <el-select v-model="form.sex" placeholder="请选择性别">
						<el-option label="男" value="男"></el-option>
						<el-option label="女" value="女"></el-option>
					</el-select> -->
          <el-radio v-model="form.sex" label="男">男</el-radio>
          <el-radio v-model="form.sex" label="女">女</el-radio>
        </el-form-item>
        <el-form-item
          label="身高(cm)"
          prop="height"
          :label-width="formLabelWidth"
        >
          <el-input v-model="form.height" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item
          label="体重(kg)"
          prop="weight"
          :label-width="formLabelWidth"
        >
          <el-input v-model="form.weight" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="目标" :label-width="formLabelWidth">
          <!-- <el-input v-model="form.aim" autocomplete="off"></el-input> -->
          <el-select v-model="form.aim">
            <el-option label="减脂" value="减脂"></el-option>
            <el-option label="塑型" value="塑型"></el-option>
            <el-option label="增肌" value="增肌"></el-option>
          </el-select>
        </el-form-item>
      </el-form>
      <div slot="footer" class="dialog-footer">
        <el-button @click="dialogFormVisible = false">取 消</el-button>
        <el-button type="primary" @click="ascertain('form')">确 定</el-button>
      </div>
    </el-dialog>

    <!-- 编辑 -->
    <el-dialog title="用户信息" :visible.sync="dialogFormVisible1">
      <div class="head-up">
        <img
          :src="require('@/img/portrait/' + editForm.imgUrl + '.jpg')"
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
      </div>
      <el-form :model="editForm">
        <el-form-item label="用户名" :label-width="formLabelWidth">
          <el-input
            placeholder="请填写用户名"
            v-model="editForm.userName"
            autocomplete="off"
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
  getUser,
  deleteSc,
  addUser,
  updateUser,
  search,
} from "@/network/user.js";
export default {
  data() {
    return {
      userData: [],
      schArr: [],
      imgUrl: "",
      imageUrl: "",
      dialogFormVisible: false,
      formLabelWidth: "120px",
      form: {
        email: "",
        password: "",
        userName: "",
        sex: "男",
        height: " ",
        weight: " ",
        aim: " ",
      },
      editForm: {
        userId: "",
        imgUrl: "null",
        userName: "",
      },
      searchText: "",
      show: true,
      show1: false,
      dialogFormVisible: false,
      dialogFormVisible1: false,
      total: 0,
      currentPage: 1,
      pagesize: 4,
      rules: {
        userName: [
          {
            required: true,
            pattern: /^[\u4e00-\u9fa5_a-zA-Z0-9]{1,10}$/,
            message: "请输入合法用户名！！！",
            trigger: ["blur"],
          },
        ],
        email: [
          {
            required: true,
            pattern: /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/,
            message: "请输入正确邮箱！！！",
            trigger: ["blur"],
          },
        ],
        password: [
          {
            required: true,
            pattern: /^\w{6,18}$/,
            message: "密码长度为6-18位！！！",
            trigger: ["blur"],
          },
        ],
      },
    };
  },
  created() {
    this.getPageDataList();
  },
  methods: {
    // 获取列表信息
    getPageDataList() {
      getUser().then((res) => {
        // console.log(res);
        this.userData = res.data;
        this.getPageData();
      });
    },

    // 删除
    deleteSelection(row) {
      this.$confirm(`确定删除用户名为${row.userName}的数据吗？`, "警告", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
      })
        .then(function () {
          return deleteSc({ id: row.userId });
        })
        .then(() => {
          this.getPageDataList();
          this.$message({
            message: "删除成功！！！",
            type: "success",
          });
        })
        .catch(() => { });
      // 笨方法
      // deleteSc({ id }).then((res) => {
      // 	this.$message({
      // 		message: "删除成功！！！",
      // 		type: "success",
      // 	});
      // });
      // let index = this.userData.findIndex((ele) => ele.userId === id);
      // console.log(index);
      // if (index === -1) {
      // 	return console.log("error");
      // } else {
      // 	this.userData.splice(index, 1);
      // 	this.getPageData();
      // }
    },

    // 上传element自带属性
    handleRemove(file, fileList) {
      console.log(file, fileList);
    },
    handlePictureCardPreview(file) {
      this.dialogImageUrl = file.url;
      this.dialogVisible = true;
    },
    handleChange(file) {
      this.imgUrl = file.name.slice(0, -4);
    },

    // 添加
    ascertain(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          addUser({
            pic: this.imgUrl ? this.imgUrl : null,
            email: this.form.email,
            password: this.form.password,
            userName: this.form.userName,
            sex: this.form.sex,
            height: this.form.height,
            weight: this.form.weight,
            aim: this.form.aim,
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
        } else {
          this.$message.error("请按提示正确填写前三项主要信息！");
        }
      });
    },

    // 编辑框弹出，编辑原内容赋值
    editUser(row) {
      this.editForm.userId = row.userId;
      // for (let item of this.userData) {
      // 	if (item.userId == id) {
      // 		// console.log(item);
      // 		this.editForm.imgUrl = item.pic;
      // 		this.editForm.userName = item.userName;
      // 	}
      // }
      this.editForm.imgUrl = row.pic;
      this.editForm.userName = row.userName;
      this.dialogFormVisible1 = true;
    },

    // 编辑图片隐藏
    deleteImg() {
      this.show = !this.show;
      this.show1 = !this.show1;
    },
    // 编辑确认
    ascertain1() {
      updateUser({
        id: this.editForm.userId,
        pic: this.imgUrl == "" ? this.editForm.imgUrl : this.imgUrl,
        userName: this.editForm.userName,
      }).then((res) => {
        console.log(res);
        this.$message.success("修改成功");
        this.getPageDataList();
        this.dialogFormVisible1 = false;
        this.$refs.upload.clearFiles();
        this.imgUrl = "";
        this.deleteImg();
      });
    },

    // 搜索
    searchBtn() {
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
    getPageData() {
      let start = (this.currentPage - 1) * this.pagesize;
      let end = start + this.pagesize;
      this.schArr = this.userData.slice(start, end);
    },

    // element分页自带属性
    handleSizeChange(val) {
      this.pagesize = val;
      this.getPageData();
    },
    handleCurrentChange(val) {
      this.currentPage = val;
      this.getPageData();
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

.head-up {
  padding-left: 70px;
  padding-bottom: 10px;
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
img {
  width: 100px;
  border-radius: 50%;
}
</style>
