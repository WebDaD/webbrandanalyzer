<?php
/**
 * Shows Login Popup
 *
 *
 * @return HTML Form
 * @version 0.8
 * @since 0.1
 * @author Dominik Sigmund
 *
 */
include("../config.php");
include("../functions.php");

$r="<h2>Login</h2>";
$r.="<table>";
$r.="	<tr>";
$r.="		<th>User</th>";
$r.="		<td>".getInput("txt_user", "")."</td>";
$r.="	</tr>";
$r.="	<tr>";
$r.="		<th>Password</th>";
$r.="		<td>".getInputPWD("txt_pwd", "")."</td>";
$r.="	</tr>";
$r.="	<tr>";
$r.="		<td></td>";
$r.="		<td><img src=\"/img/login.png\" id=\"btn_login\" class=\"button\" alt=\"Login\" onclick=\"btn_login_onclick()\"/></td>"; //TODO: Click this on Enter
$r.="	</tr>";
$r.="</table>";
echo $r;
?>