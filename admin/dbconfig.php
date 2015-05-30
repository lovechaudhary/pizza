<?php
session_start();
ob_start();
$conn=mysql_connect("localhost","competep_pizza","pizza@1234")or die(mysql_error());
$conn=mysql_select_db("competep_pizza")or die(mysql_error());
if(!$conn){
    die("database error");
}
require 'includes/functions.php';

$approot = substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT']));
$app= str_replace('\\','/',$approot);
$http=isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
$url=$http.$_SERVER['HTTP_HOST'].$app.'/';
$basic_url = $http.$_SERVER['HTTP_HOST'].'/pizza/admin/';
// $basic_url = $http.$_SERVER['HTTP_HOST'].'/';


define('APP_PATH',$basic_url);
define('CSS',APP_PATH.'css/');
define('JS',APP_PATH.'js/');
define('IMG',APP_PATH.'images/');
define('SITE_NAME', 'Pizza O More');
