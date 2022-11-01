<template>
	<div>
		<el-input
			placeholder="请输入动作名关键字进行查找"
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
			<el-table-column label="图片" width="240">
				<template slot-scope="scope">
					<img
						:src="require('@/img/action/' + scope.row.pic + '.jpg')"
						height="140px"
					/>
				</template>
			</el-table-column>
			<el-table-column prop="action_name" label="动作名" width="180">
			</el-table-column>
			<el-table-column prop="action_url" label="链接" show-overflow-tooltip>
			</el-table-column>
			<el-table-column prop="action_type" label="动作级别" width="100">
			</el-table-column>
			<el-table-column prop="action_part" label="训练部位" width="100">
			</el-table-column>
			<el-table-column prop="action_inst" label="动作类型" width="100">
			</el-table-column>
			<el-table-column prop="tips" label="贴士"> </el-table-column>
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
						@click="editAction(scope.row.actionId)"
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
			:total="actionData.length"
		>
		</el-pagination>

		<!-- 添加 -->
		<el-dialog title="训练动作" :visible.sync="dialogFormVisible">
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
					label="动作名"
					prop="action"
					:label-width="formLabelWidth"
				>
					<el-input v-model="form.action" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item
					label="链接"
					prop="action_url"
					:label-width="formLabelWidth"
				>
					<el-input
						v-model="form.action_url"
						autocomplete="off"
						type="textarea"
					></el-input>
				</el-form-item>
				<el-form-item
					label="动作级别"
					prop="grade"
					:label-width="formLabelWidth"
				>
					<el-select v-model="form.grade" placeholder="请选择动作级别">
						<el-option label="初级" value="初级"></el-option>
						<el-option label="中级" value="中级"></el-option>
						<el-option label="高级" value="高级"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item
					label="训练部位"
					prop="part"
					:label-width="formLabelWidth"
				>
					<el-select v-model="form.part" placeholder="请选择训练部位">
						<el-option label="胸部" value="胸部"></el-option>
						<el-option label="腹部" value="腹部"></el-option>
						<el-option label="背部" value="背部"></el-option>
						<el-option label="腿部" value="腿部"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item
					label="动作类型"
					prop="type"
					:label-width="formLabelWidth"
				>
					<el-select v-model="form.type" placeholder="请选择动作类型">
						<el-option label="徒手" value="徒手"></el-option>
						<el-option label="器械" value="器械"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="贴士" prop="tips" :label-width="formLabelWidth">
					<el-input v-model="form.tips" autocomplete="off"></el-input>
				</el-form-item>
			</el-form>
			<div slot="footer" class="dialog-footer">
				<el-button @click="dialogFormVisible = false">取 消</el-button>
				<el-button type="primary" @click="ascertain('form')">确 定</el-button>
			</div>
		</el-dialog>

		<!-- 编辑 -->
		<el-dialog title="训练动作" :visible.sync="dialogFormVisible1">
			<img
				:src="require('@/img/action/' + editForm.imgUrl + '.jpg')"
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
				<el-form-item label="动作名" :label-width="formLabelWidth">
					<el-input v-model="editForm.action" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item label="链接" :label-width="formLabelWidth">
					<el-input
						v-model="editForm.action_url"
						autocomplete="off"
						type="textarea"
					></el-input>
				</el-form-item>
				<el-form-item label="动作级别" :label-width="formLabelWidth">
					<el-select v-model="editForm.grade" placeholder="请选择动作级别">
						<el-option label="初级" value="初级"></el-option>
						<el-option label="中级" value="中级"></el-option>
						<el-option label="高级" value="高级"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="训练部位" :label-width="formLabelWidth">
					<el-select v-model="editForm.part" placeholder="请选择训练部位">
						<el-option label="胸部" value="胸部"></el-option>
						<el-option label="腹部" value="腹部"></el-option>
						<el-option label="背部" value="背部"></el-option>
						<el-option label="腿部" value="腿部"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="动作类型" :label-width="formLabelWidth">
					<el-select v-model="editForm.type" placeholder="请选择动作类型">
						<el-option label="徒手" value="徒手"></el-option>
						<el-option label="器械" value="器械"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="贴士" :label-width="formLabelWidth">
					<el-input v-model="editForm.tips" autocomplete="off"></el-input>
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
	action,
	deleteSc,
	addAction,
	updateAction,
	search,
} from "@/network/action.js";
export default {
	name: "Users",
	data() {
		return {
			show: true,
			show1: false,
			imgUrl: "",
			searchText: "",
			actionData: [],
			dialogFormVisible: false,
			dialogFormVisible1: false,
			imageUrl: "",
			form: {
				action: "",
				action_url: "",
				grade: "",
				part: "",
				type: "",
				tips: "",
			},
			editForm: {
				actionId: "",
				imgUrl: "四足俯卧撑",
				action: "",
				action_url: "",
				grade: "",
				part: "",
				type: "",
				tips: "",
			},
			formLabelWidth: "120px",
			schArr: [],
			total: 0,
			currentPage: 1,
			pagesize: 4,
		};
	},
	methods: {
		getPageDataList() {
			// 获取动作列表
			action().then((res) => {
				// console.log(res);
				this.actionData = res.data;
				this.getPageData();
			});
		},

		// 删除
		deleteSelection(row) {
			this.$confirm(`确定删除动作名为${row.action_name}的数据吗？`, "警告", {
				confirmButtonText: "确定",
				cancelButtonText: "取消",
				type: "warning",
			})
				.then(function () {
					return deleteSc({ id: row.actionId });
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
			// let index = this.actionData.findIndex((ele) => ele.actionId === id);
			// console.log(index);
			// if (index === -1) {
			// 	return console.log("error");
			// } else {
			// 	this.actionData.splice(index, 1);
			// 	this.getPageData();
			// }
		},

		// element文件上传属性
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

		// 搜索课程
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

		// 编辑删除图片
		deleteImg() {
			this.show = !this.show;
			this.show1 = !this.show1;
		},
		editAction(id) {
			this.editForm.actionId = id;
			for (let item of this.actionData) {
				if (item.actionId == id) {
					console.log(item);
					this.editForm.imgUrl = item.pic;
					this.editForm.action = item.action_name;
					this.editForm.action_url = item.action_url;
					this.editForm.grade = item.action_type;
					this.editForm.part = item.action_part;
					this.editForm.type = item.action_inst;
					this.editForm.tips = item.tips;
				}
			}
			this.dialogFormVisible1 = true;
		},

		// 编辑确认
		ascertain1() {
			updateAction({
				id: this.editForm.actionId,
				url: this.imgUrl == "" ? this.editForm.imgUrl : this.imgUrl,
				action: this.editForm.action,
				action_url: this.editForm.action_url,
				grade: this.editForm.grade,
				part: this.editForm.part,
				type: this.editForm.type,
				tips: this.editForm.tips,
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

		// 添加确认
		ascertain(formName) {
			if (
				this.form.action == "" ||
				this.form.action_url == "" ||
				this.form.grade == "" ||
				this.form.part == "" ||
				this.form.type == "" ||
				this.form.tips == ""
			) {
				this.$message.error("请全填写好在提交");
			} else {
				addAction({
					url: this.imgUrl,
					action: this.form.action,
					action_url: this.form.action_url,
					grade: this.form.grade,
					part: this.form.part,
					type: this.form.type,
					tips: this.form.tips,
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

		// 分页处理将需要展示数组对象放入schArr新数组中
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
