<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Credentials:false');

class Action extends Controller
{
  public function action()
  {
    $result = Db::name('u_action')->order('actionId desc')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  public function deleteSelection()
  {

    $data = input();
    // return $data;
    $id = $data['id'];
    $result = Db::table('u_action')->where('actionId', $id)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  public function addAction()
  {
    $url = input('url');
    $action = input('action');
    $action_url = input('action_url');
    $grade = input('grade');
    $part = input('part');
    $type = input('type');
    $tips = input('tips');
    $result = Db::table('u_action')->insert(['pic' => $url, 'action_name' => $action, 'action_url' => $action_url, 'action_type' => $grade, 'action_part' => $part, 'action_inst' => $type, 'tips' => $tips]);
    if ($result) {
      return $this->result($result, 1, "添加成功");
    } else {
      return $this->result(null, 0, "添加失败");
    }
  }

  public function updateAction()
  {
    $id = input('id');
    $url = input('url');
    $action = input('action');
    $action_url = input('action_url');
    $grade = input('grade');
    $part = input('part');
    $type = input('type');
    $tips = input('tips');
    $result = Db::table('u_action')->where('actionId', $id)->update(['pic' => $url, 'action_name' => $action, 'action_url' => $action_url, 'action_type' => $grade, 'action_part' => $part, 'action_inst' => $type, 'tips' => $tips]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  public function search()
  {
    $data = input('value');
    $result = Db::name('u_action')->where('action_name', 'like', '%' . $data . '%')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  public function plan()
  {
    $result = Db::name('u_plan_show')->order('planId desc')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  public function deletePlan()
  {

    $data = input();
    // return $data;
    $id = $data['id'];
    $result = Db::table('u_plan_show')->where('planId', $id)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  public function addPlan()
  {
    $url = input('url');
    $plan = input('plan');
    $grade = input('grade');
    $slogan = input('slogan');
    $plan_url = input('plan_url');
    $week = input('week');
    $day = input('day');
    $aim = input('aim');
    $type = input('type');
    $result = Db::table('u_plan_show')->insert(['img_url' => $url, 'name' => $plan, 'plan_grade' => $grade, 'slogan' => $slogan, 'plan_url' => $plan_url, 'week' => $week, 'day_everyweek' => $day, 'aim_type' => $aim, 'grade_type' => $type]);
    if ($result) {
      return $this->result($result, 1, "添加成功");
    } else {
      return $this->result(null, 0, "添加失败");
    }
  }

  public function updatePlan()
  {
    $id = input('id');
    $url = input('url');
    $plan = input('plan');
    $grade = input('grade');
    $slogan = input('slogan');
    $plan_url = input('plan_url');
    $week = input('week');
    $day = input('day');
    $aim = input('aim');
    $type = input('type');
    $result = Db::table('u_plan_show')->where('planId', $id)->update(['img_url' => $url, 'name' => $plan, 'plan_grade' => $grade, 'slogan' => $slogan, 'plan_url' => $plan_url, 'week' => $week, 'day_everyweek' => $day, 'aim_type' => $aim, 'grade_type' => $type]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  public function searchPlan()
  {
    $data = input('value');
    $result = Db::name('u_plan_show')->where('name', 'like', '%' . $data . '%')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  public function getPlans()
  {
    $userId = input('userId');
    $result = Db::name('u_colplan')->where('userId', $userId)->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  public function dbPlans()
  {
    $planId = input('planId');
    $result = Db::name('u_colplan')->where('planId', $planId)->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 前台计划取消收藏
  public function deletePlans()
  {
    $data = input();
    // return $data;
    $planId = $data['planId'];
    $result = Db::table('u_colplan')->where('planId', $planId)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  // 前台计划添加收藏
  public function addPlans()
  {
    $planId = input('planId');
    $username = input('username');
    $userId = input('userId');
    $name = input('name');
    $img = input('img');
    $plan_grade = input('plan_grade');
    $week = input('week');
    $day_everyweek = input('day_everyweek');
    $grade_type = input('grade_type');
    $result = Db::name('u_colplan')->insert(['planId' => $planId, 'username' => $username, 'userId' => $userId, 'name' => $name, 'img' => $img, 'plan_grade' => $plan_grade, 'week' => $week, 'day_everyweek' => $day_everyweek, 'grade_type' => $grade_type]);
    if ($result) {
      return $this->result($result, 1, "添加成功");
    } else {
      return $this->result(null, 0, "添加失败");
    }
  }
}
