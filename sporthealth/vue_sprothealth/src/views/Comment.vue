<template>
	<div>
		<el-input
			placeholder="请输入用户名进行查找"
			type="text"
			size="small"
			v-model="searchText"
		>
		</el-input>
		<el-button type="info" icon="el-icon-search" size="mini" @click="searchBtn"
			>搜索</el-button
		>
		<el-table
			ref="multipleTable"
			tooltip-effect="dark"
			style="width: 100%"
			:data="schArr"
			:cell-style="{ textAlign: 'center' }"
			:header-cell-style="{ textAlign: 'center' }"
		>
			<el-table-column type="index" width="100" label="序号" align="center" />
			<el-table-column label="课程图片" width="240">
				<template slot-scope="scope">
					<img
						:src="require('@/img/course/' + scope.row.coursePic + '.jpg')"
						height="140px"
					/>
				</template>
			</el-table-column>
			<el-table-column prop="courseName" label="课程名" width="240">
			</el-table-column>
			<el-table-column prop="username" label="用户名" width="160">
			</el-table-column>
			<el-table-column prop="comment" label="评论内容" show-overflow-tooltip>
			</el-table-column>
			<el-table-column prop="operate" label="操作" width="200">
				<template slot-scope="scope">
					<el-button
						type="danger"
						icon="el-icon-delete"
						circle
						@click="deleteSelection(scope.row)"
					></el-button>
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
			:total="commentData.length"
		>
		</el-pagination>
	</div>
</template>

<script>
import { getComment, searchComment, deleteComment } from "@/network/course.js";
export default {
	data() {
		return {
			searchText: "",
			commentData: [],
			schArr: [],
			total: 0,
			currentPage: 1,
			pagesize: 4,
		};
	},
	created() {
		this.getPageDataList();
	},
	methods: {
		getPageDataList() {
			getComment().then((res) => {
				if (res.code == 1 && res.data.length > 0) {
					this.commentData = res.data;
					this.getPageData();
				} else {
					this.schArr = [];
					this.$message({
						message: "暂无评论！！！",
						type: "error",
					});
				}
			});
		},
		// 分页处理将需要展示数组对象放入schArr新数组中
		getPageData() {
			let start = (this.currentPage - 1) * this.pagesize;
			let end = start + this.pagesize;
			this.schArr = this.commentData.slice(start, end);
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
		searchBtn() {
			searchComment({
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
		deleteSelection(row) {
			this.$confirm(`确定删除标题为${row.courseName}的数据吗？`, "警告", {
				confirmButtonText: "确定",
				cancelButtonText: "取消",
				type: "warning",
			})
				.then(function () {
					return deleteComment({ id: row.id });
				})
				.then(() => {
					this.getPageDataList();
					this.$message({
						message: "删除成功！！！",
						type: "success",
					});
				})
				.catch(() => {});
			// deleteComment({
			// 	id: id,
			// }).then((res) => {
			// 	console.log(res);
			// });
			// let index = this.commentData.findIndex((ele) => ele.id === id);
			// console.log(index);
			// if (index === -1) {
			// 	return console.log("error");
			// } else {
			// 	this.commentData.splice(index, 1);
			// 	this.getPageData();
			// }
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
