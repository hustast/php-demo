<?php
require_once ('../conn/connect.php');

//创建用户表
$stmt = $con->prepare("CREATE TABLE students (id          INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
                                                        studentid   CHAR(10) NOT NULL ,
                                                        passwd      CHAR(72) NOT NULL ,
                                                        registed    INT      NOT NULL DEFAULT 0) DEFAULT CHARSET=utf8");
$stmt->execute();

//创建成绩表
$stmt = $con->prepare("CREATE TABLE grades (studentid   CHAR(10)  PRIMARY KEY NOT NULL ,
                                                      name        CHAR(30)  NOT NULL ,
                                                      grade       FLOAT     NOT NULL,
                                                      rank        INT       NOT NULL ) DEFAULT CHARSET=utf8");
$stmt->execute();

//模拟导入成绩
$stmt = $con->prepare("LOAD DATA LOCAL INFILE 'grades.csv' INTO TABLE grades
                                 FIELDS TERMINATED BY ',' 
                                 ENCLOSED BY '\"' 
                                 LINES TERMINATED BY '\r\n'");
$stmt->execute();

?>