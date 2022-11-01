<template>
	<div>
		<el-input
			placeholder="请输入标题关键字进行查找"
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
			:data="schArr"
			tooltip-effect="dark"
			style="width: 100%"
			:cell-style="{ textAlign: 'center' }"
			:header-cell-style="{ textAlign: 'center' }"
		>
			<el-table-column label="图片" width="260">
				<template slot-scope="scope">
					<img
						:src="require('@/img/knowledge/' + scope.row.img + '.jpg')"
						height="140px"
					/>
				</template>
			</el-table-column>
			<el-table-column prop="title" label="标题" width="240"> </el-table-column>
			<el-table-column prop="article" label="资讯" show-overflow-tooltip>
			</el-table-column>
			<el-table-column prop="type" label="类型"> </el-table-column>
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
						@click="editInfo(scope.row.id)"
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
			:total="infoData.length"
		>
		</el-pagination>

		<!-- 添加 -->
		<el-dialog title="健身资讯" :visible.sync="dialogFormVisible">
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
					label="资讯标题"
					prop="title"
					:label-width="formLabelWidth"
				>
					<el-input v-model="form.title" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item
					label="资讯内容"
					prop="content"
					:label-width="formLabelWidth"
				>
					<el-input
						v-model="form.content"
						autocomplete="off"
						type="textarea"
					></el-input>
				</el-form-item>
				<el-form-item
					label="资讯类别"
					prop="type"
					:label-width="formLabelWidth"
				>
					<el-select v-model="form.type" placeholder="请选择资讯类别">
						<el-option label="增肌" value="增肌"></el-option>
						<el-option label="减脂" value="减脂"></el-option>
						<el-option label="塑形" value="塑形"></el-option>
					</el-select>
				</el-form-item>
			</el-form>
			<div slot="footer" class="dialog-footer">
				<el-button @click="dialogFormVisible = false">取 消</el-button>
				<el-button type="primary" @click="ascertain('form')">确 定</el-button>
			</div>
		</el-dialog>

		<!-- 编辑 -->
		<el-dialog title="健身资讯" :visible.sync="dialogFormVisible1">
			<img
				:src="require('@/img/knowledge/' + editForm.imgUrl + '.jpg')"
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
				<el-form-item label="资讯标题" :label-width="formLabelWidth">
					<el-input v-model="editForm.title" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item label="资讯内容" :label-width="formLabelWidth">
					<el-input
						v-model="editForm.content"
						autocomplete="off"
						type="textarea"
					></el-input>
				</el-form-item>
				<el-form-item label="资讯类别" :label-width="formLabelWidth">
					<el-select v-model="editForm.type" placeholder="请选择资讯类别">
						<el-option label="增肌" value="增肌"></el-option>
						<el-option label="减脂" value="减脂"></el-option>
						<el-option label="塑形" value="塑形"></el-option>
					</el-select>
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
import { knowledge } from "@/network/info.js";
import { deleteSc, addMessage, updateMessage, search } from "@/network/info.js";

export default {
	data() {
		return {
			show: true,
			show1: false,
			imgUrl: "",
			searchText: "",
			infoData: [],
			multipleSelection: [],
			input: "",
			dialogFormVisible: false,
			dialogFormVisible1: false,
			imageUrl: "",
			form: {
				title: "",
				type: "",
				content: "",
			},
			editForm: {
				id: "",
				imgUrl: 3,
				title: "",
				type: "",
				content: "",
			},
			formLabelWidth: "120px",
			schArr: [],
			total: 0,
			currentPage: 1,
			pagesize: 2,
		};
	},

	methods: {
		getPageDataList() {
			knowledge().then((res) => {
				this.infoData = res.data;
				this.getPageData();
			});
		},
		deleteSelection(row) {
			this.$confirm(`确定删除标题为${row.title}的数据吗？`, "警告", {
				confirmButtonText: "确定",
				cancelButtonText: "取消",
				type: "warning",
			})
				.then(function () {
					return deleteSc({ id: row.id });
				})
				.then(() => {
					this.getPageDataList();
					this.$message({
						message: "删除成功！！！",
						type: "success",
					});
				})
				.catch(() => {});
			// deleteSc({
			// 	id: id,
			// }).then((res) => {
			// 	this.$message({
			// 		message: "删除成功！！！",
			// 		type: "success",
			// 	});
			// });
			// let index = this.infoData.findIndex((ele) => ele.id === id);
			// console.log(index);
			// if (index === -1) {
			// 	return console.log("error");
			// } else {
			// 	this.infoData.splice(index, 1);
			// 	this.getPageData();
			// }
		},
		handleRemove(file, fileList) {
			console.log(file, fileList);
		},
		handlePictureCardPreview(file) {
			this.dialogImageUrl = file.url;
			this.dialogVisible = true;
		},
		handleChange(file) {
			this.imgUrl = file.name.slice(0, -4);
			// addMessage({
			// 	url: file.name.slice(0, -4),
			// }).then((res) => {
			// 	console.log(res);
			// });
		},
		deleteImg() {
			this.show = !this.show;
			this.show1 = !this.show1;
		},
		editInfo(id) {
			this.editForm.id = id;
			for (let item of this.infoData) {
				if (item.id == id) {
					console.log(item);
					this.editForm.imgUrl = item.img;
					this.editForm.title = item.title;
					this.editForm.content = item.article;
					this.editForm.type = item.type;
				}
			}
			this.dialogFormVisible1 = true;
		},
		ascertain1() {
			updateMessage({
				id: this.editForm.id,
				img: this.imgUrl == "" ? this.editForm.imgUrl : this.imgUrl,
				title: this.editForm.title,
				content: this.editForm.content,
				type: this.editForm.type,
			}).then((res) => {
				this.getPageDataList();
				this.$message.success("修改成功");
				this.dialogFormVisible1 = false;
				this.$refs.upload.clearFiles();
				this.imgUrl = "";
				this.deleteImg();
			});
		},

		ascertain(formName) {
			if (
				this.form.title == "" ||
				this.form.type == "" ||
				this.form.content == ""
			) {
				this.$message.error("请全填写好在提交");
			} else {
				addMessage({
					url: this.imgUrl,
					title: this.form.title,
					content: this.form.content,
					type: this.form.type,
				}).then((res) => {
					this.getPageDataList();
					this.$message({
						message: "添加成功！！！",
						type: "success",
					});
				});
				this.dialogFormVisible = false;
				// this.$nextTick(() => {
				// 	this.$refs[formName].resetFields();
				// 	this.$refs.upload.clearFiles();
				// });
				this.$refs[formName].resetFields();
				this.$refs.upload.clearFiles();
			}
		},

		// 搜索资讯
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
			this.schArr = this.infoData.slice(start, end);
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

	created() {
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
