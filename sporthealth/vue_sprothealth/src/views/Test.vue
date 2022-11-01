<template>
	<div class="all">
		<div class="header">
			<div class="left">
				<el-breadcrumb separator-class="el-icon-arrow-right">
					<el-breadcrumb-item>资产清点</el-breadcrumb-item>
					<el-breadcrumb-item>镜像</el-breadcrumb-item>
				</el-breadcrumb>
			</div>
			<div class="right">
				<div class="dayTime">数据更新于：xxxxxxx</div>
				<el-button>更新数据</el-button>
			</div>
		</div>

		<div class="hint">
			<div class="down_hint">
				<el-alert title="本地镜像资产聚合展示xxxx" type="info" show-icon>
				</el-alert>
			</div>
		</div>

		<div class="search">
			<el-form :inline="true" :model="formInline" class="demo-form-inline">
				<el-form-item>
					<el-input
						class="width-120"
						size="small"
						placeholder="搜索Repository"
						suffix-icon="el-icon-search"
						v-model="formInline.user"
					>
					</el-input>
				</el-form-item>
				<el-form-item>
					<el-input
						class="width-120"
						size="small"
						placeholder="搜索tag"
						suffix-icon="el-icon-search"
					>
					</el-input>
				</el-form-item>
				<el-form-item>
					<el-input
						class="width-120"
						size="small"
						placeholder="搜索镜像ID"
						suffix-icon="el-icon-search"
					>
					</el-input>
				</el-form-item>
				<el-form-item>
					<el-input
						class="width-120"
						size="small"
						placeholder="搜索主机IP"
						suffix-icon="el-icon-search"
					>
					</el-input>
				</el-form-item>
				<el-form-item>
					<el-input
						class="width-120"
						size="small"
						placeholder="搜索节点名"
						suffix-icon="el-icon-search"
					>
					</el-input>
				</el-form-item>
				<el-form-item>
					<el-button size="small" type="primary" @click="onSubmit"
						>筛选</el-button
					>
				</el-form-item>
				<el-form-item>
					<el-link type="primary" :underline="false">重置</el-link>
				</el-form-item>
			</el-form>
		</div>

		<div class="main">
			<div class="number">0 项</div>
			<div class="table">
				<el-table style="width: 100%">
					<el-table-column label="Repository" width="230">
						<template slot-scope="scope">
							<span style="margin-left: 10px">1</span>
						</template>
					</el-table-column>
					<el-table-column label="tag" width="230">
						<template slot-scope="scope">
							<span style="margin-left: 10px">1</span>
						</template>
					</el-table-column>
					<el-table-column label="创建时间" width="230">
						<template slot-scope="scope">
							<span style="margin-left: 10px">1</span>
						</template>
					</el-table-column>
					<el-table-column label="镜像大小" width="230">
						<template slot-scope="scope">
							<span style="margin-left: 10px">1</span>
						</template>
					</el-table-column>
					<el-table-column label="关联镜像" width="230">
						<template slot-scope="scope">
							<span style="margin-left: 10px">1</span>
						</template>
					</el-table-column>
					<el-table-column label="操作" width="130">
						<template slot-scope="scope">
							<el-button size="mini">编辑</el-button>
							<el-button size="mini" type="danger">删除</el-button>
						</template>
					</el-table-column>
					<el-table-column label="图标">
						<template slot-scope="scope">
							<span style="margin-left: 10px">1</span>
						</template>
					</el-table-column>
				</el-table>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			formInline: {
				user: "",
				region: "",
			},
		};
	},
	methods: {
		onSubmit() {
			console.log("submit!");
		},
	},
};
</script>

<style scoped lang="less">
.all {
	.header {
		display: flex;
		justify-content: space-between;
		align-items: center;
		.right {
			display: flex;
			justify-content: center;
			align-items: center;
			.dayTime {
				margin-right: 30px;
			}
		}
	}

	.hint {
		margin: 10px 0;
	}

	.search {
		margin-top: 5px;
		.demo-form-inline .width-120 {
			width: 140px;
		}
	}

	.main .number {
		margin-bottom: 20px;
	}
}
</style>
