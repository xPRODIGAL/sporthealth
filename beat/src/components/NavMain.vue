<template>
  <div id="nav-main">
    <div class="nav-ti"></div>
    <header id="header">
      <ul>
        <li class="logo" key="logo">
          <router-Link :to="Logo.Link_href"
            ><img :src="Logo.img_url" alt=""
          /></router-Link>
        </li>
        <li v-for="item in Links" :key="item.Link_text">
          <router-Link :to="item.Link_href">{{ item.Link_text }}</router-Link>
        </li>
        <li v-if="!show">
          <router-Link :to="Personal.Link_href">{{
            Personal.Link_text
          }}</router-Link>
          <p v-for="item in PersonalDetail">
            <router-Link :to="item.Link_href">{{ item.Link_text }}</router-Link>
          </p>
          <button @click="exit">{{ Exit }}</button>
        </li>
        <li v-if="show">
          <router-Link :to="Login.Link_href">{{ Login.Link_text }}</router-Link>
        </li>
      </ul>
    </header>
  </div>
</template>

<script>
export default {
  inject: ["reload"],
  name: "nav-main",
  data() {
    return {
      show: false,
      transitionName: "slide-right",

      Logo: { img_url: require("../assets/logo.png"), Link_href: "/" },
      Links: [
        { Link_text: "健身动作", Link_href: "/action" },
        { Link_text: "训练计划", Link_href: "/plan", click: "plan" },
        { Link_text: "特色课程", Link_href: "/course" },
        { Link_text: "健身知识", Link_href: "/knowledge" },
        { Link_text: "健身工具", Link_href: "/tools/toolcenter" }
        // {"Link_text":"下载App","Link_href":"/download"},
      ],
      Personal: { Link_text: "个人中心", Link_href: "/personal" },
      Login: { Link_text: "登录", Link_href: "/login" },
      Exit: "退出登录",
      PersonalDetail: [
        // { Link_text: "观看记录", Link_href: "/personal/uservideo" },
        { Link_text: "我的收藏", Link_href: "/personal/mycollection" },
        { Link_text: "我的计划", Link_href: "/personal/myplan" },
        { Link_text: "我的评论", Link_href: "/personal/mycoment" },
        { Link_text: "安全中心", Link_href: "/personal/myset/userinfo" }
      ]
    };
  },
  methods: {
    exit: function() {
      this.show = true;
      localStorage.removeItem("token");
      localStorage.removeItem("userName");
      localStorage.removeItem("pic");
      localStorage.removeItem("userId");
      this.$router.push("/blank");
    }
  },
  created() {
    if (localStorage.getItem("token")) {
      this.show = false;
    } else {
      this.show = true;
    }
  }
};
</script>

<style scoped>
.nav-ti {
  height: 50px;
}

#header {
  top: 0;
  position: fixed;
  margin: auto;
  height: 50px;
  width: 100%;
  background-color: #202023;
  opacity: 0.9;
  z-index: 1000;
}

#header ul {
  height: 50px;
  width: 1180px;
  line-height: 50px;
  list-style: none;
  margin: auto;
  display: flex;
  justify-content: space-between;
}
header ul li {
  text-align: center;
  color: #d7d7d7;
  min-width: 100px;
}
header ul li a {
  width: 80px;
  color: white;
  text-decoration: none;
  opacity: 0.8;
}
header ul li a:hover {
  color: white;
  opacity: 1;
}
header ul li img:hover {
  opacity: 1;
}
header li a {
  font-size: 16px;
}
header li a img {
  position: relative;
  height: 38px;
  width: 60px;
  /*right: 10px;*/
  left: 8px;
  opacity: 1;
}
header ul .logo {
  margin-top: 4px;
  margin-right: 100px;
}

li p {
  display: block;
  background: black;
  width: 100px;
  text-align: center;
  height: 40px;
  line-height: 40px;
  transition: all 0.5s ease-in-out;
  visibility: hidden;
  opacity: 0;
}
li button {
  display: block;
  background: black;
  width: 100px;
  text-align: center;
  height: 40px;
  line-height: 40px;
  transition: all 0.5s ease-in-out;
  visibility: hidden;
  opacity: 0;
  border: none;
  color: white;
  outline: none;
  font-size: 16px;
  cursor: pointer;
}
li:hover p {
  display: block;

  visibility: visible;
  opacity: 0.9;
}
li:hover button {
  display: block;

  visibility: visible;
  opacity: 0.8;
}
</style>
