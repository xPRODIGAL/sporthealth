<template>
	<el-container class="home_container">
		<!-- 头部栏 -->
		<el-header>
			<div>
				<img src="../assets/logo1.png" alt="" />
				<span>运动健康管理系统</span>
			</div>
			<el-button type="info" @click="logout">退出</el-button>
		</el-header>
		<el-container>
			<!-- 侧边栏 -->
			<el-aside :width="isCollapse ? '50px' : '200px'">
				<div class="toggle-button" @click="toggleCollpase">|||</div>
				<el-menu
					background-color="darkgray"
					text-color="#fff"
					active-text-color="#409EFF"
					unique-opened
					:router="true"
					:collapse="isCollapse"
					:collapse-transition="false"
				>
					<el-submenu index="1">
						<template slot="title"
							><div style="float: left; margin-left: 20%">
								<i class="el-icon-user"></i>用户管理
							</div></template
						>
						<el-menu-item index="/users"
							><i class="el-icon-menu"></i>用户列表</el-menu-item
						>
					</el-submenu>
					<el-submenu index="2">
						<template slot="title"
							><div style="float: left; margin-left: 20%">
								<i class="el-icon-coordinate"></i>动作管理
							</div></template
						>
						<el-menu-item index="/action"
							><i class="el-icon-menu"></i>动作列表</el-menu-item
						>
					</el-submenu>
					<el-submenu index="3">
						<template slot="title"
							><div style="float: left; margin-left: 20%">
								<i class="el-icon-s-order"></i>计划管理
							</div></template
						>
						<el-menu-item index="/plan"
							><i class="el-icon-menu"></i>计划列表</el-menu-item
						>
					</el-submenu>
					<el-submenu index="4">
						<template slot="title"
							><div style="float: left; margin-left: 20%">
								<i class="el-icon-reading"></i>课程管理
							</div></template
						>
						<el-menu-item index="/course"
							><i class="el-icon-menu"></i>课程列表</el-menu-item
						>
					</el-submenu>
					<el-submenu index="5">
						<template slot="title"
							><div style="float: left; margin-left: 20%">
								<i class="el-icon-reading"></i>资讯管理
							</div></template
						>
						<el-menu-item index="/info"
							><i class="el-icon-menu"></i>资讯列表</el-menu-item
						>
					</el-submenu>
					<el-submenu index="6">
						<template slot="title"
							><div style="float: left; margin-left: 20%">
								<i class="el-icon-s-order"></i>轮播管理
							</div></template
						>
						<el-menu-item index="/carousel"
							><i class="el-icon-menu"></i>轮播列表</el-menu-item
						>
					</el-submenu>
					<el-submenu index="7">
						<template slot="title"
							><div style="float: left; margin-left: 20%">
								<i class="el-icon-s-comment"></i>评论管理
							</div></template
						>
						<el-menu-item index="/comments"
							><i class="el-icon-menu"></i>评论列表</el-menu-item
						>
						<!-- <el-menu-item index="/Test"
							><i class="el-icon-menu"></i>测试列表</el-menu-item
						> -->
					</el-submenu>
				</el-menu>
			</el-aside>
			<!-- 主体框 -->
			<el-main>
				<router-view />
			</el-main>
		</el-container>
	</el-container>
</template>

<script>
export default {
	data() {
		return {
			isCollapse: false, // 是否折叠属性
		};
	},
	methods: {
		logout() {
			window.sessionStorage.clear();
			this.$router.push("/login");
		},
		toggleCollpase() {
			this.isCollapse = !this.isCollapse;
		},
	},
};
</script>

<style lang="less" scoped>
.home_container {
	height: 100%;
}
.el-header {
	background-color: gray;
	display: flex;
	justify-content: space-between;
	align-items: center;
	color: #fff;
	font-size: 25px;
	padding-left: 0;
	> div {
		display: flex;
		align-items: center;
		span {
			margin-left: 10px;
		}
	}
}
.el-aside {
	background-color: darkgray;
}
.el-main {
	background-color: whitesmoke;
}

.toggle-button {
	background: #4a5064;
	font-size: 10px;
	text-align: center;
	line-height: 24px;
	color: #fff;
	letter-spacing: 0.2em;
	cursor: pointer;
}
</style>
