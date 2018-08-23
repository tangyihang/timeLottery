<?php
error_reporting(0);
$config = mysql_connect("localhost","root","sths12501")or die("Mysql Connect Error");//设置数据库IP，账号，密码
mysql_select_db("xingcai869");//数据库库名
mysql_query("SET NAMES UTF8");
?>