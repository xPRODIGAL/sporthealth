<?php

namespace app\util;

use PHPMailer\PHPMailer\PHPMailer;

class Mail
{

  static function send($email, $subject, $content)
  {
    $mailer = new PHPMailer(true);
    $mailer->CharSet = config('smtp.charset');
    $mailer->isSMTP();
    //根据邮件服务提供商的不同,此处服务器域名可能不相同
    $mailer->Host = config('smtp.host'); //smtp.qq.com   smtp.163.com
    $mailer->SMTPAuth = true;
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mailer->Username = config('smtp.username');
    $mailer->Password = config('smtp.password');
    $mailer->Port = 994;

    $mailer->setFrom($mailer->Username);
    $mailer->addAddress($email);
    $mailer->isHTML(true);
    $mailer->Subject = $subject;
    $mailer->Body = $content;
    return $mailer->send();
  }
}
