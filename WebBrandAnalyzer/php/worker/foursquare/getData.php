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

//INTO DATABASE: Besucher:XX|BesucherChange:XX|BesucherScore:XX|CheckIns:YY|CheckInChange:YY|CheckInScore:YY|Score:ZZ
/*
 * Besucher (Anzahl, Änderung) > Score = Anzahl + (Änderung / Last-Time)
Check-Ins (Anzahl, Änderung) > Score = Anzahl + (Änderung / Last-Time)
FS-Score = Besucherscore + CHeck-In_Score
 */

mysql_close();
?>