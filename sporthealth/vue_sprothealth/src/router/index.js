import Vue from "vue";
import VueRouter from "vue-router";
import Login from "../components/Login.vue";
import Home from "../components/Home.vue";
import Users from "../views/Users.vue";
import Info from "../views/Info.vue";
import Action from "../views/Action.vue";
import Plan from "../views/Plan.vue";
import Course from "../views/Course.vue";
import Comment from "../views/Comment.vue";
import Carousel from "../views/Carousel.vue";

Vue.use(VueRouter);

const routes = [
	{
		path: "/",
		redirect: "/login",
	},
	{
		path: "/login",
		component: Login,
	},
	{
		path: "/home",
		component: Home,
		children: [
			{
				path: "/users",
				component: Users,
			},
			{
				path: "/info",
				component: Info,
			},
			{
				path: "/action",
				component: Action,
			},
			{
				path: "/plan",
				component: Plan,
			},
			{
				path: "/course",
				component: Course,
			},
			{
				path: "/comments",
				component: Comment,
			},
			{
				path: "/carousel",
				component: Carousel,
			},
		],
	},
];
const originalPush = VueRouter.prototype.push;
VueRouter.prototype.push = function push(location) {
	return originalPush.call(this, location).catch((err) => err);
};

const router = new VueRouter({
	routes,
	mode: "history",
});

//路由导航守卫;
router.beforeEach((to, from, next) => {
	if (to.path === "/login") return next();
	//获取token
	const tokenStr = window.sessionStorage.getItem("token");
	if (!tokenStr) return next("/login");
	next();
});

export default router;
