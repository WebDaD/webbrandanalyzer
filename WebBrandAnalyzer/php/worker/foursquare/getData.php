<?php
/**
 * Worker: Reads Data For Brand ID
 *
 *
 * @return String 0=OK, 1=FAIL
 * @version 0.1
 * @since 0.1
 * @param $_POST["id"]	ID of Brand
 * @author Dominik Sigmund
 *
 */
include("../config.php");
include("../db_connect.php");
include("../helper.php");

$r="";

$debug = getPar("d");
if($debug!=""){$debug=true;}
else {$debug=false;}

$id=getPar("id",true,"No ID given.");
if($debug)echo "ID: ".$id."<br/>";



mysql_close();
?>