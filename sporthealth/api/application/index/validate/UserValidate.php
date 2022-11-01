<?php

namespace app\index\validate;

use think\Validate;

class UserValidate extends Validate
{
  protected $batch = true;

  protected $rule = [
    'resetEmail' => 'require|email',
    'email' => 'require|email|unique:User',
    'passwd' => 'require|min:6',
    'repasswd' => 'confirm:passwd',
  ];

  protected $message = [
    'email.require' => 'eamil必填',
    'passwd.min' => '密码不能少于六位',
    'repasswd.confirm' => '两次密码不一致',
  ];

  protected $scene = [
    'register' => ['email', 'passwd', 'repasswd'],
    'reset' => ['resetEmail'],
  ];

}
