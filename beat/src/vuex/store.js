import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);
const state = {
    login_status: false,
    search: "",
    aim_type: "",
    day_type: "",
    apparatus_type: "",
    bodypart_type: "",
    grade_type: "",
    plan: "",
    action: "",
    page_nidex: "",
    action_num: "",
    click_index_planid: "",
    click_index_actionid: "",
    video_info: "",
    course_info: "",
    course_name: "",
    click_index_courseid: "",
    richeng_id: "",
    user_traning_id: "",
    richeng: "",
    richeng_finish: "",

    user_id: "",
    telephone: "",
    password: "",
    new_password: "",
    user_info: "",

    tooldetail: "", //确定计算工具面包屑显示内容

    aim: "",
    course: "",
    value: "",
    grade: "",
    values: "",

    coursevideo: "",
    url: "",
    courseid: "",
    id: ""
};

const store = new Vuex.Store({
    // 定义状态
    state
});

export default store;