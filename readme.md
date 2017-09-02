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

login ： 登录处理 和 查询页面

	->action.php 登录处理查询html
	->register.php 注册处理

mysql：从excl中生成mysql数据库

          ->build.php 生成成绩数据库

-> index.php  登录前端页面

-> signup.php 注册前端页面



####  log

9.2    修改前端页面，加入学院logo

9.2   加密方式暂定md5+sha256+pwd_hash

9.2   signup.php中限制学号和密码的长度，密码20，学号10，试图防止SQL注入

9.2   实现发送邮件功能，测试u201613443@hust.edu.cn 正常    

9.2   signup.php当成前端页面具体处理在login/register.php





#####  问题

* 防sql注入
* conn/connect.php中 数据表EIC需重新设计
* 在signup.php中补充邮箱验证模块
* 在signup.php中更新密码及用户名
* 在mysql/build.php中建立成绩数据库（excel cvs文件处理--->mysql）
* 







