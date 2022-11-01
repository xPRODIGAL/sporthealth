<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\validate\UserValidate;
use PHPMailer\PHPMailer\PHPMailer;


header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:*');
header('Access-Control-Allow-Credentials:false');


class User extends Controller
{

  public function login()
  {
    $email = input('email');
    $password = input('password');
    $result = Db::name('u_user')->where('email', $email)->where('password', md5($password))->find();
    if ($result) {
      $token = $this->request->token('loginToken', 'sha1');
      $userInfo = [
        'token' => $token,
        'result' => $result,
      ];
      return $this->result($userInfo, 1, "登陆成功");
    } else {
      return $this->result(null, 0, "登陆失败");
    }
  }

  // 注册
  public function register()
  {
    $email = input('email');
    $password = input('password');
    $name = input('name');
    // $code = rand(1000, 9999);
    $result1 = Db::name('u_user')->where('email', $email)->find();
    if ($result1) {
      return $this->result($result1, 1, "账号已存在！！！");
    } else {
      $result = Db::name('u_user')->insert(['email' => $email, 'password' => md5($password), 'userName' => $name]);
      if ($result) {
        return $this->result($result, 0, "增加成功");
      } else {
        return $this->result(null, -1, "增加失败");
      }
    }
  }

  // 找回密码
  public function retrieve()
  {
    $email = input('email');
    $password = input('password');
    $code = input('code');
    $result = Db::name('u_user')->where('email', $email)->where('code', $code)->update(['password' => md5($password)]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  // 后台查找用户
  public function getUser()
  {
    $result = Db::name('u_user')->order('userId desc')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 前台查找用户信息
  public function getInfos()
  {
    $userId = input('userId');
    $result = Db::name('u_user')->where('userId', $userId)->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 前台修改头像
  public function uploadPic()
  {
    $pic = input('pic');
    $userId = input('userId');
    $result = Db::table('u_user')->where('userId', $userId)->update(['pic' => $pic]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  // 前台修改个人信息
  public function updateInfo()
  {
    $userId = input('userId');
    $userName = input('userName');
    $sex = input('sex');
    $height = input('height');
    $weight = input('weight');
    $aim = input('aim');
    $result = Db::table('u_user')->where('userId', $userId)->update(['userName' => $userName, 'sex' => $sex, 'height' => $height, 'weight' => $weight, 'aim' => $aim]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  // 后台删除用户信息
  public function deleteSelection()
  {
    $data = input();
    // return $data;
    $id = $data['id'];
    $result = Db::table('u_user')->where('userId', $id)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  // 后台添加新用户
  public function addUser()
  {
    $pic = input('pic');
    $email = input('email');
    $password = input('password');
    $userName = input('userName');
    $sex = input('sex');
    $height = input('height');
    $weight = input('weight');
    $aim = input('aim');
    $result = Db::table('u_user')->insert(['pic' => $pic, 'email' => $email, 'password' => md5($password), 'userName' => $userName, 'sex' => $sex, 'height' => $height, 'weight' => $weight, 'aim' => $aim]);
    if ($result) {
      return $this->result($result, 1, "添加成功");
    } else {
      return $this->result(null, 0, "添加失败");
    }
  }

  public function updateUser()
  {
    $id = input('id');
    $pic = input('pic');
    $userName = input('userName');
    $result = Db::table('u_user')->where('userId', $id)->update(['pic' => $pic, 'userName' => $userName]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  // 后台搜索
  public function search()
  {
    $data = input('value');
    $result = Db::name('u_user')->where('username', 'like', '%' . $data . '%')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 前台修改个人密码
  public function resetPassword()
  {
    $id = input('id');
    $email = input('email');
    $password = input('password');
    $new_password = input('new_password');
    $result = Db::table('u_user')->where('userId', $id)->where('email', $email)->where('password', md5($password))->update(['password' => md5($new_password)]);
    if ($result) {
      return $this->result($result, 1, "修改成功");
    } else {
      return $this->result(null, 0, "修改失败");
    }
  }

  // 获取轮播
  public function getCarousel()
  {
    $result = Db::name('u_carousel')->select();
    if ($result) {
      return $this->result($result, 1, "查找成功");
    } else {
      return $this->result(null, 0, "查找失败");
    }
  }

  // 添加轮播
  public function addCarousel()
  {
    $imgSrc = input('imgSrc');
    $result = Db::name('u_carousel')->insert(['imgSrc' => $imgSrc]);
    if ($result) {
      return $this->result($result, 1, "添加成功");
    } else {
      return $this->result(null, 0, "添加失败");
    }
  }

  // 后台删除用户信息
  public function delCarousel()
  {
    $data = input();
    // return $data;
    $id = $data['id'];
    $result = Db::table('u_carousel')->where('id', $id)->delete();
    if ($result) {
      return $this->result($result, 1, "删除成功");
    } else {
      return $this->result(null, 0, "删除失败");
    }
  }

  public function mail()
  {
    $email = input('email');
    $code = rand(1000, 9999);
    $result = Db::name('u_user')->where('email', $email)->update(['code' => $code]);
    // if ($result) {
    //   return $this->result($result, 1, "增加成功");
    // } else {
    //   return $this->result(null, 0, "增加失败");
    // }
    $mail = new PHPMailer();
    // 邮件调试模式
    $mail->SMTPDebug = 1;
    //设置邮件使用SMTP
    $mail->isSMTP();
    // 设置邮件程序以使用SMTP
    $mail->Host = 'smtp.163.com';
    // 设置邮件内容的编码
    $mail->CharSet = 'UTF-8';
    // 启用SMTP验证
    $mail->SMTPAuth = true;
    // SMTP username
    $mail->Username = 'a365856177@163.com';
    // SMTP password
    $mail->Password = 'QNKZVFBROOVGXUYM';
    // 连接的TCP端口
    $mail->Port = 994;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //设置发件人
    $mail->setFrom('a365856177@163.com');
    //  添加收件人1
    $mail->addAddress('365856177@qq.com'); // Add a recipient
    //            收件人回复的邮箱
    $mail->addReplyTo('a365856177@163.com');
    // 将电子邮件格式设置为HTML
    $mail->isHTML(true);
    $mail->Subject = '运动平台给你发的邮箱';
    $mail->Body = <<< MAIL
     <h3>你的验证码是:</h3>
     <p>{$code}</p >
     <p>有效期:十分钟</p >
     MAIL;
    //    $mail->AltBody = '这是非HTML邮件客户端的纯文本';
    $mail->send();
    echo 'Message has been send';
    return $this->result($code, 1, "邮箱验证成功");
  }
}
