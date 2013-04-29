<?php
/**
 * API for WBA
 *
 * Basic Use: table, command, returntype, pars(key|value,key2|value2)
 *
 * @version 0.1
 * @since 0.1
 * @author Dominik Sigmund
 *
 */
if(count($_GET) == 0 && count($_POST) == 0){
	$html="<h1>API for WBA</h1>";
	
	die($html);
	//TODO: No API Commands here, print Documentation, then die
}
include("php/config.php");
include("php/db_connect.php");
include("php/functions.php");

$token=getPar("token",true,"No Token given.");
//TODO: check Token. if wrong, die

$table=getPar("table",true,"No Table given."); //tables (events, etc) and metatable ops
$command=getPar("cmd",true,"No Command given."); //list, delete, get, new, edit
$giveback=getPar("r"); //Maybe xml, json, png, html, pdf
if($giveback=="")$giveback="xml";


$pa = getPar("pars");
if($pa!=""){
	$pt = explode(",", $pa);
	foreach ($pt as $par){
		$t = explode("|",$par);
		$pars[$t[0]]=$t[1];
	}
}
$pars["t"] = $giveback;
//TODO: Double Switch on Table, then Command
switch($table){
	case "events":
		switch($command){

			default:die("No Valid Command given");
		}
		break;
	default:die("No Valid table given.");
}
if($giveback=="xml"){
	header("Content-Type:text/xml");
	if(!startsWith($r,"<") && !endsWith($r, ">")){ //Error somewhere
		echo "<error>".$r."</error>";
	}
	else {
		echo $r;
	}
}
else {
	echo $r;
}
?>