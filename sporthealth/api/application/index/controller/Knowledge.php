<?php

namespace app\index\controller;

use think\Controller;
use think\Db;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Credentials:false');



class Knowledge extends Controller
{
  public function knowledge()
  {
    $result = Db::name('u_knowledge')->order('id desc')->select();
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
    $result = Db::table('u_knowledge')->where('id', $id)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  public function addMessage()
  {
    $url = input('url');
    $title = input('title');
    $content = input('content');
    $type = input('type');
    $result = Db::table('u_knowledge')->insert(['img' => $url, 'title' => $title, 'article' => $content, 'type' => $type]);
    if ($result) {
      return $this->result($result, 1, "添加成功");
    } else {
      return $this->result(null, 0, "添加失败");
    }
  }

  public function updateMessage()
  {
    $id = input('id');
    $url = input('img');
    $title = input('title');
    $content = input('content');
    $type = input('type');
    $result = Db::table('u_knowledge')->where('id', $id)->update(['img' => $url, 'title' => $title, 'article' => $content, 'type' => $type]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  public function search()
  {
    $data = input('value');
    $result = Db::name('u_knowledge')->where('title', 'like', '%' . $data . '%')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  //轮播图
  public function carousel()
  {
    $result = Db::name('u_carousel')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }
}
