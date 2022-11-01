<template>
	<div class="login_container">
		<div class="login_box">
			<div class="avatar_box">
				<img src="../assets/logo.png" alt="" />
			</div>
			<!-- 表单区域 -->
			<el-form
				:model="loginForm"
				:rules="loginFormRules"
				ref="loginFormRef"
				label-width="0px"
				class="login_form"
			>
				<!-- 用户名 -->
				<el-form-item prop="username">
					<el-input
						v-model="loginForm.username"
						prefix-icon="el-icon-user"
					></el-input>
				</el-form-item>
				<!-- 密码 -->
				<el-form-item prop="password">
					<el-input
						v-model="loginForm.password"
						prefix-icon="iconfont icon-3702mima"
						type="password"
					></el-input>
				</el-form-item>
				<!-- 按钮 -->
				<el-form-item class="btns">
					<el-button type="success" @click="login">登录</el-button>
					<el-button type="info" plain @click="resetLoginForm">重置</el-button>
				</el-form-item>
			</el-form>
		</div>
	</div>
</template>

<script>
import { login } from "@/network/login.js";
export default {
	data() {
		return {
			loginForm: {
				username: "",
				password: "",
			},
			loginFormRules: {
				username: [
					{ required: true, message: "请输入账户名称", trigger: "blur" },
					{ min: 3, max: 10, message: "长度在 3 到 10个字符", trigger: "blur" },
				],
				password: [
					{ required: true, message: "请输入密码名称", trigger: "blur" },
					{ min: 6, max: 15, message: "长度在 6到 15 个字符", trigger: "blur" },
				],
			},
		};
	},
	methods: {
		resetLoginForm() {
			this.$refs.loginFormRef.resetFields();
		},
		login() {
			// console.log(this.loginForm.username);
			login(this.loginForm).then((res) => {
				console.log(res);
				if (res.code == 1) {
					window.sessionStorage.setItem("token", res.data);
					this.$router.push("/users");
				}
			});
			// this.$refs.loginFormRef.validate((valid) => {
			// 	if (!valid) return;

			// });
		},
	},
};
</script>

<style lang="less" scoped>
.login_container {
	background-color: antiquewhite;
	height: 100%;
}
.login_box {
	height: 320px;
	width: 540px;
	background-color: #fff;
	border-radius: 10%;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);

	.avatar_box {
		height: 120px;
		width: 120px;
		border: 1px solid #fff;
		border-radius: 50%;
		padding: 8px;
		position: absolute;
		left: 50%;
		transform: translate(-50%, -50%);
		background-color: #fff;
		box-shadow: 0 0 10px #ddd;
		img {
			height: 100%;
			width: 100%;
			border-radius: 50%;
			background-color: #eee;
		}
	}
}
.login_form {
	position: absolute;
	bottom: 0;
	width: 100%;
	padding: 0 10px;
	box-sizing: border-box;
}
.btns {
	display: flex;
	justify-content: flex-end;
}
</style>
