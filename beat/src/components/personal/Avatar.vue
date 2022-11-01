<template>
  <div class="chan_head">
    <div class="change_head">
      <input
        type="file"
        id="upload_file"
        @change="upload_file"
        title="更换头像"
      />
      <img
        :src="require('../../img/portrait/' + info.pic + '.jpg')"
        height="100%"
        width="100%"
        style="margin-top: -100px;border-radius: 50%"
      />
    </div>
    <div class="format">
      <span
        ><strong>{{ info.userName }}</strong></span
      >
    </div>
  </div>
</template>

<script>
import { uploadPic, getInfos } from "../../network/user";
export default {
  name: "Avatar",
  data() {
    return {
      usersData: [],
      img: "",
      name: "",
      info: {
        userName: localStorage.getItem("userName"),
        pic: localStorage.getItem("pic")
      }
    };
  },
  created() {
    // this.getUserList();
    getInfos({
      userId: localStorage.getItem("userId")
    }).then(res => {
      console.log(res);
    });
    this.$router.go(0);
  },
  mounted() {},
  methods: {
    // getUserList() {
    //   getInfos({
    //     userId: localStorage.getItem("userId")
    //   }).then(res => {
    //     this.usersData = res.data;
    //   });
    // },
    //修改头像
    upload_file(e) {
      // let this_new01 = this;
      var file = e.target.files[0];
      console.log(e.target.files[0]);
      var file_name = file.name.slice(0, -4);
      this.info.pic = file_name;
      localStorage.removeItem("pic");
      localStorage.setItem("pic", this.info.pic);
      uploadPic({
        pic: this.info.pic,
        userId: localStorage.getItem("userId")
      }).then(res => {
        console.log(res);
      });
    }
  },
  created() {}
};
</script>

<style scoped>
.change_head {
  width: 130px;
  height: 130px;
  background-image: url("https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png");
  border-radius: 50%;
  background-size: cover;
  margin-left: 50px;
}
#upload_file {
  opacity: 0;
  width: 110px;
  height: 100px;
}
.change_head #upload_file:hover {
  cursor: pointer;
}
.format {
  margin-left: 50px;
  padding: 10px;
  width: 120px;
  text-align: center;
  color: black;
}
.format span {
  font-size: 13px;
  color: #78797f;
}
</style>
