<?php
/**
 * Logs out the User by destroying the session
 *
 *
 * @return int 1 or 0
 * @version 1.0
 * @since 0.1
 * @author Dominik Sigmund
 *
 */
setcookie("wba_id", "", time()-3600);
setcookie("wba_user", "", time()-3600);
setcookie("wba_pwd", "", time()-3600);
setcookie("wba_name", "", time()-3600);

session_start();

$_SESSION=array();

if(session_destroy())
{
	echo "You have been succesfully logged out. CLose Browser please. Security ;-)<br/>";
}
else
{
	echo "0";
}

?>
