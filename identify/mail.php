<?php
    
    require_once 'src/PHPMailer.php';    
    require_once 'src/SMTP.php';

    $studentid = strtolower($studentid);
    $toemail   = $studentid."@hust.edu.cn";//拼接成hust邮箱

    $mail = new PHPMailer();//调用方法
	try {

	    $mail->SMTPDebug  = 0;                         // 调试，发布时设置0
        $mail->CharSet = 'utf-8';// 设置utf-8		
	    $mail->isSMTP();                              
	    $mail->Host       = 'smtp.126.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth   = true;                               // Enable SMTP authentication
	    $mail->Username   = 'husteicast@126.com';                 // SMTP username
	    $mail->Password   = 'ast123456';                           // SMTP password
	    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    $mail->setFrom('husteicast@126.com', 'husteic');
	    $mail->addAddress("$toemail");               
	    $mail->addReplyTo("husteic@126.com","husteic");

	    $mail->isHTML(true);  //格式html
	    $mail->Subject = '您好，这是你的验证链接';

	    $id_base = base64_encode($studentid);//学号加密
	    $mail->Body    = "亲爱的".$studentid."：<br/><br/>请点击链接激活您的帐号，这是您的激活链接<br/> 
    <a href='http://39.108.208.211/php-demo/identify/active.php?verify=".$id_base."' target= 
'_blank'>http://39.108.208.211/php-demo/identify/active.php?verify=".$id_base."</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问<br><br><br>HUST.EIC";
	    $mail->AltBody = '';

	    $mail->send();
	  	//echo '发送成功';
	   
	} catch (Exception $e) {
	    //echo '邮件发送失败了，请再试试吧';
	    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	}