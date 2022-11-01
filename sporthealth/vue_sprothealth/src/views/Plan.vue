<template>
	<div>
		<el-input
			placeholder="请输入计划名关键字进行查找"
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
						:src="require('@/img/plan/' + scope.row.img_url + '.jpg')"
						height="140px"
					/>
				</template>
			</el-table-column>
			<el-table-column prop="name" label="计划名" width="140">
			</el-table-column>
			<el-table-column prop="plan_grade" label="等级类型" width="140">
			</el-table-column>
			<el-table-column prop="slogan" label="标语" show-overflow-tooltip>
			</el-table-column>
			<el-table-column prop="plan_url" label="计划链接" show-overflow-tooltip>
			</el-table-column>
			<el-table-column prop="week" label="周数" width="100"> </el-table-column>
			<el-table-column prop="day_everyweek" label="天数" width="100">
			</el-table-column>
			<el-table-column prop="aim_type" label="目的" width="100">
			</el-table-column>
			<el-table-column prop="grade_type" label="难度"> </el-table-column>
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
						@click="editPlan(scope.row.planId)"
					>
					</el-button>
				</template>
			</el-table-column>
		</el-table>

		<el-dialog title="训练计划" :visible.sync="dialogFormVisible">
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
				<el-form-item label="计划名" prop="plan" :label-width="formLabelWidth">
					<el-input v-model="form.plan" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item
					label="等级类型"
					prop="grade"
					:label-width="formLabelWidth"
				>
					<el-input v-model="form.grade" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item label="标语" prop="slogan" :label-width="formLabelWidth">
					<el-input v-model="form.slogan" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item
					label="链接"
					prop="plan_url"
					:label-width="formLabelWidth"
				>
					<el-input
						v-model="form.plan_url"
						autocomplete="off"
						type="textarea"
					></el-input>
				</el-form-item>
				<el-form-item label="周数" prop="week" :label-width="formLabelWidth">
					<el-select v-model="form.week" placeholder="请选择计划周期">
						<el-option label="3" value="3"></el-option>
						<el-option label="6" value="6"></el-option>
						<el-option label="8" value="8"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="天数" prop="day" :label-width="formLabelWidth">
					<el-select v-model="form.day" placeholder="请选择每周天数">
						<el-option label="3" value="3"></el-option>
						<el-option label="4" value="4"></el-option>
						<el-option label="6" value="6"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="目的" prop="aim" :label-width="formLabelWidth">
					<el-select v-model="form.aim" placeholder="请选择计划目的">
						<el-option label="增肌" value="增肌"></el-option>
						<el-option label="减脂" value="减脂"></el-option>
						<el-option label="塑形" value="塑形"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="难度" prop="type" :label-width="formLabelWidth">
					<el-select v-model="form.type" placeholder="请选择计划难度">
						<el-option label="1" value="1"></el-option>
						<el-option label="2" value="2"></el-option>
						<el-option label="3" value="3"></el-option>
						<el-option label="4" value="4"></el-option>
						<el-option label="5" value="5"></el-option>
					</el-select>
				</el-form-item>
			</el-form>
			<div slot="footer" class="dialog-footer">
				<el-button @click="dialogFormVisible = false">取 消</el-button>
				<el-button type="primary" @click="ascertain('form')">确 定</el-button>
			</div>
		</el-dialog>

		<!-- 分页 -->
		<el-pagination
			@size-change="handleSizeChange"
			@current-change="handleCurrentChange"
			:current-page="currentPage"
			:page-sizes="[1, 2, 3, 4]"
			:page-size="pagesize"
			layout="total, sizes, prev, pager, next, jumper"
			:total="planData.length"
		>
		</el-pagination>

		<el-dialog title="训练计划" :visible.sync="dialogFormVisible1">
			<img
				:src="require('@/img/plan/' + editForm.imgUrl + '.jpg')"
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
				<el-form-item label="计划名" :label-width="formLabelWidth">
					<el-input v-model="editForm.plan" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item label="等级类型" :label-width="formLabelWidth">
					<el-input v-model="editForm.grade" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item label="标语" :label-width="formLabelWidth">
					<el-input v-model="editForm.slogan" autocomplete="off"></el-input>
				</el-form-item>
				<el-form-item label="链接" :label-width="formLabelWidth">
					<el-input
						v-model="editForm.plan_url"
						autocomplete="off"
						type="textarea"
					></el-input>
				</el-form-item>
				<el-form-item label="周数" :label-width="formLabelWidth">
					<el-select v-model="editForm.week" placeholder="请选择计划周期">
						<el-option label="3" value="3"></el-option>
						<el-option label="6" value="6"></el-option>
						<el-option label="8" value="8"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="天数" :label-width="formLabelWidth">
					<el-select v-model="editForm.day" placeholder="请选择每周天数">
						<el-option label="3" value="3"></el-option>
						<el-option label="4" value="4"></el-option>
						<el-option label="6" value="6"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="目的" :label-width="formLabelWidth">
					<el-select v-model="editForm.aim" placeholder="请选择计划目的">
						<el-option label="增肌" value="增肌"></el-option>
						<el-option label="减脂" value="减脂"></el-option>
						<el-option label="塑形" value="塑形"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="难度" :label-width="formLabelWidth">
					<el-select v-model="editForm.type" placeholder="请选择计划难度">
						<el-option label="1" value="1"></el-option>
						<el-option label="2" value="2"></el-option>
						<el-option label="3" value="3"></el-option>
						<el-option label="4" value="4"></el-option>
						<el-option label="5" value="5"></el-option>
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
import {
	plan,
	deletePlan,
	addPlan,
	updatePlan,
	search,
} from "@/network/plan.js";
export default {
	data() {
		return {
			show: true,
			show1: false,
			planData: [],
			imgUrl: "",
			searchText: "",
			dialogFormVisible: false,
			dialogFormVisible1: false,
			imageUrl: "",
			form: {
				plan: "",
				grade: "",
				slogan: "",
				plan_url: "",
				week: "",
				day: "",
				aim: "",
				type: "",
			},
			editForm: {
				planId: "",
				imgUrl: "tu1",
				plan: "",
				grade: "",
				slogan: "",
				plan_url: "",
				week: "",
				day: "",
				aim: "",
				type: "",
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
			plan().then((res) => {
				// console.log(res);
				this.planData = res.data;
				this.getPageData();
			});
		},
		deleteSelection(row) {
			this.$confirm(`确定删除计划名为${row.name}的数据吗？`, "警告", {
				confirmButtonText: "确定",
				cancelButtonText: "取消",
				type: "warning",
			})
				.then(function () {
					return deletePlan({ id: row.planId });
				})
				.then(() => {
					this.getPageDataList();
					this.$message({
						message: "删除成功！！！",
						type: "success",
					});
				})
				.catch(() => {});
			//笨小孩
			// deletePlan({
			// 	id: id,
			// }).then((res) => {
			// 	this.$message({
			// 		message: "删除成功！！！",
			// 		type: "success",
			// 	});
			// });
			// let index = this.planData.findIndex((ele) => ele.planId === id);
			// console.log(index);
			// if (index === -1) {
			// 	return console.log("error");
			// } else {
			// 	this.planData.splice(index, 1);
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
		},
		ascertain(formName) {
			if (
				this.form.plan == "" ||
				this.form.grade == "" ||
				this.form.slogan == "" ||
				this.form.plan_url == "" ||
				this.form.week == "" ||
				this.form.day == "" ||
				this.form.aim == "" ||
				this.form.type == ""
			) {
				this.$message.error("请全填写好再提交");
			} else {
				addPlan({
					url: this.imgUrl,
					plan: this.form.plan,
					grade: this.form.grade,
					slogan: this.form.slogan,
					plan_url: this.form.plan_url,
					week: this.form.week,
					day: this.form.day,
					aim: this.form.aim,
					type: this.form.type,
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
		deleteImg() {
			this.show = !this.show;
			this.show1 = !this.show1;
		},
		editPlan(id) {
			this.editForm.planId = id;
			for (let item of this.planData) {
				if (item.planId == id) {
					console.log(item);
					this.editForm.imgUrl = item.img_url;
					this.editForm.plan = item.name;
					this.editForm.grade = item.plan_grade;
					this.editForm.slogan = item.slogan;
					this.editForm.plan_url = item.plan_url;
					this.editForm.week = item.week;
					this.editForm.day = item.day_everyweek;
					this.editForm.aim = item.aim_type;
					this.editForm.type = item.grade_type;
				}
			}
			this.dialogFormVisible1 = true;
		},
		ascertain1() {
			updatePlan({
				id: this.editForm.planId,
				url: this.imgUrl == "" ? this.editForm.imgUrl : this.imgUrl,
				plan: this.editForm.plan,
				slogan: this.editForm.slogan,
				grade: this.editForm.grade,
				plan_url: this.editForm.plan_url,
				week: this.editForm.week,
				day: this.editForm.day,
				aim: this.editForm.aim,
				type: this.editForm.type,
			}).then((res) => {
				this.$message.success("修改成功");
				this.getPageDataList();
				this.dialogFormVisible1 = false;
				this.imgUrl = "";
				this.$refs.upload.clearFiles();
				this.deleteImg();
			});
		},
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
			this.schArr = this.planData.slice(start, end);
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
