<template>
    <div id="navleft">
      <ul>
        <li v-for ="item in Links" :key="item.Link_text">
          <router-Link :to="item.Link_href">{{item.Link_text}}</router-Link>
        </li>
      </ul>
    </div>
</template>

<script>
    export default {
        name: "NavLeft",
        data () {
          return {
            Links:[
              {"Link_text":"基本资料","Link_href":"/personal/myset/userinfo"},
              {"Link_text":"修改信息","Link_href":"/personal/myset/chagneinfo"},
              {"Link_text":"修改密码","Link_href":"/personal/myset/changepassword"},
            ]
          }
        },
    }
</script>

<style scoped>
  #navleft{
    background: rgba(164, 172, 184, 0.23);
    height: 412px;
  }
ul li{
  padding: 40px 30px;
}
  a{
    list-style: none;
    text-decoration: none;
    color: black;
  }
  a:hover{
    color: orangered;
  }
</style>
