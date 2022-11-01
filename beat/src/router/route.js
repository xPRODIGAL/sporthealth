import Vue from "vue";
import Router from "vue-router";
import Index from "../components/Index";
import Plan from "../components/Plan";
import Course from "../components/Course";
import CourseDetail from "../components/CourseDetail";
import Action from "../components/Action";
import Personal from "../components/Personal";
import Knowledge from "../components/Knowledge";
import knowLedgeInfo from "../components/knowledge/knowLedgeInfo";

import Register from "../components/personal/Register";
import Login from "../components/personal/Login";
import RetrievePassword from "../components/personal/RetrievePassword";
import Tools from "../components/Tools";
import ToolsCenter from "../components/tools/ToolsCenter";
import ToolDetailOne from "../components/tools/ToolDetailOne";
import ToolDetailTwo from "../components/tools/ToolDetailTwo";
import ToolDetailThree from "../components/tools/ToolDetailThree";
import ToolDetailFour from "../components/tools/ToolDetailFour";
import ToolDetailFive from "../components/tools/ToolDetailFive";
import ToolDetailSix from "../components/tools/ToolDetailSix";
import PlanDetail from "../components/PlanDetail";
import ActionDetail from "../components/ActionDetail";
import TraningMain from "../components/TraningMain";

import Usercord from "../components/personal/Usercourse";
import Mycollection from "../components/personal/Mycollection";
import Myplan from "../components/personal/Myplan";
import Mycoment from "../components/personal/Mycoment";
import Myset from "../components/personal/Myset";
import UserInfo from "../components/personal/saiting/UserInfo";
import ChangeInfo from "../components/personal/saiting/ChangeInfo";
import ChangePassword from "../components/personal/saiting/ChangePassword";

import Collectionvideo from "../components/personal/Record/Collectionvideo";
import CourseVideo from "../components/personal/Record/CourseVideo";
import Blank from "../components/Blank";

Vue.use(Router);

export default new Router({
    routes: [{
            path: "/",
            name: "index",
            component: Index
        },
        {
            path: "/knowLedgeInfo",
            name: "knowLedgeInfo",
            component: knowLedgeInfo
        },
        {
            path: "/blank",
            name: "blank",
            component: Blank
        },
        {
            path: "/personal",
            name: "personal",
            component: Personal,
            children: [{
                    path: "uservideo",
                    name: "uservideo",
                    component: CourseVideo
                },
                {
                    path: "usercord",
                    name: "usercord",
                    component: Usercord
                        // children: []
                },
                {
                    path: "collectionvideo",
                    name: "collectionvideo",
                    component: Collectionvideo
                },
                {
                    path: "mycollection",
                    name: "mycollection",
                    component: Mycollection
                },
                {
                    path: "myplan",
                    name: "myplan",
                    component: Myplan
                },
                {
                    path: "mycoment",
                    name: "mycoment",
                    component: Mycoment
                },
                {
                    path: "myset",
                    name: "myset",
                    component: Myset,
                    children: [{
                            path: "userinfo",
                            name: "userinfo",
                            component: UserInfo
                        },
                        {
                            path: "chagneinfo",
                            name: "chagneinfo",
                            component: ChangeInfo
                        },
                        {
                            path: "changepassword",
                            name: "changepassword",
                            component: ChangePassword
                        }
                    ]
                }
            ]
        },

        {
            path: "/plan/",
            name: "plan",
            component: Plan
        },
        {
            path: "/action/",
            name: "action",
            component: Action
        },
        {
            path: "/course/",
            name: "course",
            component: Course
        },
        {
            path: "/coursedetail/",
            name: "coursedetail",
            component: CourseDetail
        },
        {
            path: "/knowledge/",
            name: "knowledge",
            component: Knowledge
        },
        {
            path: "/plandetail/",
            name: "plandetail",
            component: PlanDetail
        },
        {
            path: "/actiondetail/",
            name: "actiondetail",
            component: ActionDetail
        },
        {
            path: "/traningmain/",
            name: "traningmain",
            component: TraningMain
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
        {
            path: "/login/",
            name: "login",
            component: Login
        },
        {
            path: "/retrieve",
            name: "retrieve",
            component: RetrievePassword
        },
        {
            path: "/tools",
            name: "tools",
            component: Tools,
            children: [{
                    path: "toolcenter",
                    name: "toolcenter",
                    component: ToolsCenter
                },
                {
                    path: "tooldetailone",
                    name: "tooldetailone",
                    component: ToolDetailOne
                },
                {
                    path: "tooldetailtwo",
                    name: "tooldetailtwo",
                    component: ToolDetailTwo
                },
                {
                    path: "tooldetailthree",
                    name: "tooldetailthree",
                    component: ToolDetailThree
                },
                {
                    path: "tooldetailfour",
                    name: "tooldetailfour",
                    component: ToolDetailFour
                },
                {
                    path: "tooldetailfive",
                    name: "tooldetailfive",
                    component: ToolDetailFive
                },
                {
                    path: "tooldetailsix",
                    name: "tooldetailsix",
                    component: ToolDetailSix
                }
            ]
        }
    ]
});