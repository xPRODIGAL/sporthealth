<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
  public function login()
  {
    // return 'a';
    $data = input();
    $username = $data['username'];
    $password = $data['password'];
    $result = Db::name('s_sport')->where('username', $username)->where('password', $password)->find();
    if ($result) {
      $token = $this->request->token('loginToken', 'sha1');
      return $this->result($token, 1, "登陆成功");
    } else {
      return $this->result(null, 0, "登陆失败");
    }
  }
}
