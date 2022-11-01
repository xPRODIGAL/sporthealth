<template>
  <div class="link">
    <div class="link_content">
      <div class="link_adr_action">
        <router-link :to="links.links_active">健身动作</router-link>
        <ul id="link_video">
          <li v-for="active in actives">
            <a
              href="javascript:void 0"
              :id="active.id"
              @click="click_link_active(active.id)"
              >{{ active.name }}</a
            >
          </li>
        </ul>
      </div>
      <div class="link_adr_plan">
        <router-link :to="links.links_plan">训练计划</router-link>
        <ul id="link_plan">
          <li v-for="plan in plans">
            <a
              href="javascript:void 0"
              :id="plan.id"
              @click="click_link_plan(plan.id)"
              >{{ plan.name }}</a
            >
          </li>
        </ul>
      </div>
      <div class="link_adr_course">
        <router-link :to="links.links_course">全部课程</router-link>
        <ul id="link_course">
          <li v-for="course in courses">
            <a
              href="javascript:void 0"
              :id="course.id"
              @click="click_link_course(course.id)"
              >{{ course.name }}</a
            >
          </li>
        </ul>
      </div>
      <div class="link_adr_knows">
        <router-link :to="links.links_info">健身知识</router-link>
        <ul>
          <li v-for="know in knows">
            <router-link :to="know.to" :id="know.id">{{
              know.title
            }}</router-link>
          </li>
        </ul>
      </div>
      <div class="link_adr_tools">
        <router-link :to="links.links_tools">计算工具</router-link>
        <ul>
          <li v-for="tool in tools" @click="click_tool(tool.title, tool.to)">
            <router-link to="" :id="tool.id">{{ tool.title }}</router-link>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "index_center_link",
  data() {
    return {
      links: {
        links_active: "/active",
        links_plan: "/plan",
        links_course: "/course",
        links_info: "/info",
        links_tools: "/tools/toolcenter"
      },
      actives: [],
      plans: [],
      courses: [],
      knows: [
        {
          id: 1,
          title: "知识",
          to: ""
        },
        {
          id: 2,
          title: "知识",
          to: ""
        },
        {
          id: 3,
          title: "知识",
          to: ""
        },
        {
          id: 4,
          title: "知识",
          to: ""
        },
        {
          id: 5,
          title: "知识",
          to: ""
        },
        {
          id: 6,
          title: "知识",
          to: ""
        }
      ],
      tools: [
        {
          id: 1,
          title: "一分钟了解自已",
          to: "/tools/toolcenter"
        },

        {
          id: 2,
          title: "身体质量指数(BMI)",
          to: "/tools/tooldetailtwo"
        },
        {
          id: 3,
          title: "标准体重计算",
          to: "/tools/tooldetailthree"
        },
        {
          id: 4,
          title: "基础代谢计算",
          to: "/tools/tooldetailfour"
        },
        {
          id: 5,
          title: "最大围度计算",
          to: "/tools/tooldetailfive"
        },
        {
          id: 6,
          title: "补水计算",
          to: "/tools/tooldetailsix"
        }
      ]
    };
  },
  created() {},
  methods: {
    click_link_active: function(id) {
      this.$store.state.click_index_activeid = id;
      // console.log(id);
    },
    click_link_plan: function(id) {
      this.$store.state.click_index_planid = id;
      // console.log(id);
    },
    click_link_course: function(id) {
      this.$store.state.click_index_courseid = id;
      // console.log(id);
    },
    click_tool: function(title, to) {
      this.$store.state.tooldetail = title;
      this.$router.push(to);
    }
  }
};
</script>
<style scoped>
.link {
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
  width: 100%;
  background: #353539;
  text-align: center;
  /*background: rgba(229, 229, 229, 0.36);*/
}

.link .link_content {
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto auto;

  width: 1180px;
  display: flex;
  justify-content: space-between;
}

.link .link_content .link_adr_action {
  margin-top: 10px;
  width: 235px;
  /*height: 206px;*/
}
.link .link_content .link_adr_course {
  margin-top: 10px;
  width: 235px;
  /*height: 206px;*/
}

.link .link_content .link_adr_knows {
  margin-top: 10px;
  width: 235px;
  /*height: 206px;*/
}

.link .link_content .link_adr_plan {
  margin-top: 10px;
  width: 235px;
  /*height: 206px;*/
}

.link .link_content .link_adr_tools {
  margin-top: 10px;
  width: 235px;
  /*height: 206px;*/
}

.link .link_content a {
  color: #a4a8b2;
  text-decoration: none;
  font-size: 16px;
}

.link .link_content ul {
  list-style: none;
}

.link .link_content ul li {
  margin: 8px auto;
}

.link .link_content a:hover {
  color: #cb4550;
}

.link .link_content ul li a {
  color: #a4a8b2;
  font-size: 12px;
  text-decoration: none;
}
</style>
