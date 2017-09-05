#### 网站框架

conn : mysql 数据库链接文件

	->config.php 数据库密码，用户名

	->connect.php 链接

css  ：前端样式

	->bootrap.css my.css

identify： 验证码  发送邮件

	->img.php 生成验证码

	->mail.php 取得学号，邮箱，发送验证邮件
	->src  phpmailer 配置文件
	-> active.php 处理验证链接

login ： 登录处理 和 查询页面

	->action.php 登录处理查询html
	->register.php 注册处理

mysql：从excl中生成mysql数据库

          ->build.php 生成成绩数据库
          其中students为学生学号密码表
             grades为成绩表
          ->grades.csv 成绩文件

-> index.php  登录前端页面

-> signup.php 注册前端页面



####  log

9.2    修改前端页面，加入学院logo

9.2   加密方式md5+sha256+pwd_hash

9.2   实现发送邮件功能，测试u201613443@hust.edu.cn 正常    

9.2   signup.php当成前端页面具体处理在login/register.php

9.3   加入版权信息,改前端页面

9.3   mysql/build.php 处理第二个表单

9.4解决password_hash(),无法验证的问题（使用password_verify）

#####  问题

* 细节处理
* 成绩数据库导入


# 思路

## 需求

**成绩排名查询系统 涉及注册、登录、查询 **

## 架构

HTML      PHP      MySQL

## 思路

* 用学号+密码+验证码注册

* 利用hust学生邮箱验证

* 成绩表 excel->csv->mysql

  ​

##细节

* 前端页面参考GitHub登录界面，使用bootstrap框架

* 验证码：随机生成四位数，生成一张图片，生成干扰线条及噪点，合成图片

* 利用PHP的PDO对象防止sql注入

* 注册：填写学号+密码，并将密码用3层hash函数加密后存入数据库

* 验证邮件：利用库PHPMailer.php , SMTP.php。注册发件邮箱，向hust邮箱发送验证邮件

  ```
  http://39.108.208.211/php-demo/identify/active.php?verify=".$id_base."
  ```

* 登录：查询数据库，验证账号密码是否匹配 以及验证码是否正确

* 成绩查询：利用学号检索数据库，输出成绩




