<?php 
$config = array(
	'host'		=> 'localhost',
	'username' 	=> 'root',
	'password' 	=> 'root',
	'dbname' 	=> 'bookshare'
);

$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec("SET NAMES 'utf8'"); // 使存入数据库中文不乱码。
?>