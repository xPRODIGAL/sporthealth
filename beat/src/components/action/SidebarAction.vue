<template>
  <div id="sidebar">
    <div class="sidebar_ti" v-show="show_state"></div>
    <div class="sidebar" v-show="show_state">
      <div class="sekuai"></div>
      <div class="sidebar-content">
        <!-- <search-main></search-main> -->
        <apparatus-main></apparatus-main>
        <bodypart-main></bodypart-main>
        <grade-main></grade-main>
      </div>
    </div>
    <div
      class="sidebar-btn"
      :class="{ selectAll: !isshow, changeSelectAll: isshow }"
    >
      <div class="btn-main" @click="bar_close">
        <img src="../../img/键.png" />
      </div>
    </div>
  </div>
</template>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script>
// import Search from "../SearchForAction";
import Apparatus from "../action/ApparatusForAction";
import Bodypart from "../action/BodypartForAction";
import Grade from "../action/GradeForAction";
export default {
  name: "sidebar",
  data() {
    return {
      show_state: true,
      isshow: false
    };
  },
  methods: {
    bar_close: function() {
      if (this.show_state == false) {
        this.show_state = true;
        this.isshow = false;
      } else {
        this.show_state = false;

        this.isshow = true;
      }
    }
  },
  components: {
    // "search-main": Search,
    "apparatus-main": Apparatus,
    "bodypart-main": Bodypart,
    "grade-main": Grade
  }
};
</script>

<style scoped>
/* @import url(http://fonts.googleapis.com/css?family=Roboto:300, 100, 900); */
* {
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box;
  box-sizing: content-box;
}

html {
  font-family: "Roboto", sans-serif;
  background: white;
}

.sidebar {
  position: fixed;
  top: 50px;
  left: 0;
  bottom: 0;
  width: 300px;
  background: rgba(0, 0, 0, 0.8);
  z-index: 900;
}

.sidebar_ti {
  width: 300px;
}
.sekuai {
  width: 16px;
  height: 16px;
  position: absolute;
  bottom: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.8);
  z-index: 1000;
}
.sidebar-content {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 280px;
  padding: 10px;
  color: white;
  overflow: auto;
}

::-webkit-scrollbar {
  height: 16px;
  overflow: visible;
  width: 16px;
}

::-webkit-input-placeholder element,
::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.2);
  background-clip: padding-box;
  border: solid transparent;
  border-width: 1px 1px 1px 6px;
  min-height: 28px;
  padding: 100px 0 0;
  box-shadow: inset 1px 1px 0 rgba(0, 0, 0, 0.1),
    inset 0 -1px 0 rgba(0, 0, 0, 0.07);
}

::-webkit-slider-thumb element,
::-webkit-scrollbar-button {
  height: 0;
  width: 0;
}

::-webkit-search-cancel-button element,
::-webkit-scrollbar-track {
  background-clip: padding-box;
  border: solid transparent;
  border-width: 0 0 0 4px;
}

::-webkit-search-results-decoration element,
::-webkit-scrollbar-corner {
  background: transparent;
}
.sidebar-btn {
  position: fixed;
  left: 300px;
  top: 330px;
  width: 10px;
  display: flex;
  align-items: center;
}
.selectAll {
  left: 300px;
}
.changeSelectAll {
  left: 0;
}
.btn-main {
  top: 200px;
  width: 10px;
}
.sidebar-btn .btn-main img {
  width: 10px;
}
</style>
