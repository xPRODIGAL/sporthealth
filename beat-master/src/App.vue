<template>
  <div class="beat">
    <div class="b_header">
      <nav-mymain></nav-mymain>
    </div>
    <div class="b_center">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import NavMain from "./components/NavMain";

export default {
  name: "app",
  provide() {
    return {
      reload: this.reload
    };
  },
  data() {
    return {
      isRouterShow: true
    };
  },
  methods: {
    reload() {
      this.isRouterShow = false;
      this.$nextTick(function() {
        this.isRouterShow = true;
      });
    }
  },
  components: { "nav-mymain": NavMain }
};
</script>

<style>
button，html,
body,
body div,
span,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
abbr,
address,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
samp,
small,
strong,
sub,
sup,
var,
b,
i,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
figure,
footer,
header,
menu,
nav,
section,
time,
mark,
audio,
video,
details,
summary {
  margin: 0;
  padding: 0;
}
ul li {
  list-style: none;
}

button:hover {
  opacity: 1;
}
.beat {
  font: 16px Arial, Verdana, "Microsoft YaHei";
  background: #f2f2f2;
}
.b_header {
  height: 100%;
}
.b_center {
  min-height: 100%;
  overflow: hidden;
}

body {
  font-family: sans-serif;
}
</style>
