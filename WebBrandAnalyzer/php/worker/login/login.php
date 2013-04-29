<?php
/**
 * Performs the Login for given User and Password
 * 
 * 
 * @return int 1 for OK or 0 for false
 * @param $_POST["name"] Username
 * @param $_POST["pwd"] Password(md5-coded)
 * @version 0.9
 * @since 0.1
 * @author Dominik Sigmund
 * 
 */
if($_GET["d"]=="1")$debug=true;
else $debug=false;

include("../config.php");
include("../db_connect.php");
include("../functions.php");

if(!$debug){
	if($_POST["name"] == ""){die("0");}
	if($_POST["pwd"] == ""){die("0");}
}
else {
	if($_GET["name"] == ""){die("0");}
	if($_GET["pwd"] == ""){die("0");}
}
if($debug){
	echo "<pre>";
	print_r($_GET);
	echo "</pre>";
}
if(!$debug){
	$sql = "SELECT id, first_name FROM user WHERE login='".$_POST["name"]."' AND pwd='".$_POST["pwd"]."'";
}
else {
	$sql = "SELECT id, first_name FROM user WHERE login='".$_GET["name"]."' AND pwd='".$_GET["pwd"]."'";
	echo $sql."<br/>";
}

$res = mysql_fetch_row(mysql_query($sql));
if($debug){
	echo "<pre>";
	print_r($res);
	echo "</pre>";
}
$id = $res[0];
if($id==0 || $id == "")die("0");

session_start();

mysql_close();

$_SESSION["wba_id"] = $id;
$_SESSION["wba_name"] = $res[1];
if($debug){
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
}
echo $res[1];
?>