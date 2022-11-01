<?php

namespace app\index\controller;

use think\Controller;
use think\Db;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Credentials:false');


class Course extends Controller
{
  public function course()
  {
    $result = Db::name('u_course')->order('courseId desc')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  public function deleteCourse()
  {

    $data = input();
    // return $data;
    $id = $data['id'];
    $result = Db::table('u_course')->where('courseId', $id)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  public function addCourse()
  {
    // $data = input();
    // return $data;
    $url = input('url');
    $name = input('name');
    $course_url = input('course_url');
    $aim = input('aim');
    $inst = input('inst');
    $type = input('type');
    $part = input('part');
    $burn = input('burn');
    $time = input('time');
    $degree = input('degree');
    $intro = input('intro');
    $result = Db::table('u_course')->insert(['pic' => $url, 'course_name' => $name, 'course_url' => $course_url, 'course_aim' => $aim, 'course_inst' => $inst, 'course_type' => $type, 'course_part' => $part, 'course_burn' => $burn, 'course_time' => $time, 'degree' => $degree, 'course_intro' => $intro]);
    if ($result) {
      return $this->result($result, 1, "添加成功");
    } else {
      return $this->result(null, 0, "添加失败");
    }
  }

  public function updateCourse()
  {
    $id = input('id');
    $url = input('url');
    $name = input('name');
    $course_url = input('course_url');
    $aim = input('aim');
    $inst = input('inst');
    $type = input('type');
    $part = input('part');
    $burn = input('burn');
    $time = input('time');
    $degree = input('degree');
    $intro = input('intro');

    $result = Db::table('u_course')->where('courseId', $id)->update(['pic' => $url, 'course_name' => $name, 'course_url' => $course_url, 'course_aim' => $aim, 'course_inst' => $inst, 'course_type' => $type, 'course_part' => $part, 'course_burn' => $burn, 'course_time' => $time, 'degree' => $degree, 'course_intro' => $intro]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  public function searchCourse()
  {
    $data = input('value');
    $result = Db::name('u_course')->where('course_name', 'like', '%' . $data . '%')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 前台获取个人评论信息
  // public function getCommont()
  // {
  //   $username = input('username');
  //   $result = Db::name('u_comment')->where('username', $username)->order('id desc')->select();
  //   if ($result) {
  //     return $this->result($result, 1, "查找成功");
  //   } else {
  //     return $this->result(null, 0, "查找失败");
  //   }
  // }

  //前台获取评论信息
  public function getCommont()
  {
    $result = Db::name('u_comment')->order('id desc')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 前台添加评论信息
  public function addCommont()
  {
    $pic = input('pic');
    $id = input('courseId');
    $username = input('username');
    $userId = input("userId");
    $comment = input('comment');
    $coursePic = input('coursePic');
    $courseName = input('courseName');
    $result = Db::name('u_comment')->where('username', $username)
      ->insert(['pic' => $pic, 'courseId' => $id, 'username' => $username, 'userId' => $userId, 'comment' => $comment, 'coursePic' => $coursePic, 'courseName' => $courseName]);
    if ($result) {
      return $this->result($result, 1, "增加成功");
    } else {
      return $this->result(null, 0, "增加失败");
    }
  }

  // 前台后台删除评论
  public function deleteComment()
  {

    $data = input();
    // return $data;
    $id = $data['id'];
    $result = Db::table('u_comment')->where('id', $id)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  // 前台查找收藏课程
  public function getClasses()
  {
    $userId = input('userId');
    $result = Db::name('u_collect')->where('userId', $userId)->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 前台课程添加收藏
  public function addClasses()
  {
    $courseId = input('courseId');
    $username = input('username');
    $userId = input("userId");
    $course_name = input('course_name');
    $course_pic = input('course_pic');
    $course_inst = input('course_inst');
    $course_part = input('course_part');
    $course_type = input('course_type');
    $result = Db::name('u_collect')->insert(['courseId' => $courseId, 'username' => $username, 'userId' => $userId, 'course_name' => $course_name, 'course_pic' => $course_pic, 'course_inst' => $course_inst, 'course_part' => $course_part, 'course_type' => $course_type]);
    if ($result) {
      return $this->result($result, 1, "添加成功");
    } else {
      return $this->result(null, 0, "添加失败");
    }
  }

  // 前台课程取消收藏
  public function deleteClasses()
  {
    $data = input();
    // return $data;
    $courseId = $data['courseId'];
    $result = Db::table('u_collect')->where('courseId', $courseId)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  // 已收藏课程
  public function dbClasses()
  {
    $courseId = input('courseId');
    $result = Db::name('u_collect')->where('courseId', $courseId)->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  //后台获取评论信息
  public function getComment()
  {
    $result = Db::name('u_comment')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 后台搜索
  public function searchComment()
  {
    $data = input('value');
    $result = Db::name('u_comment')->where('username', 'like', '%' . $data . '%')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }
}
