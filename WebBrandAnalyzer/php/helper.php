<?php
/**
 * Default Functions for Workers
 *
 *
 * @version 0.1
 * @since 0.1
 * @author Dominik Sigmund
 *
 */

/**
 * Converts MySQL-DateTime to hr datetime
 *
 *  @param $mysql_datetime mysql_date_time
 *  @since 0.1
 *  @return d.m.y. H:i Uhr
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function datetime2hrt($mysql_datetime){
	return date("d.m.y H:i", strtotime($mysql_datetime))." Uhr";
}
/**
 * Converts MySQL-DateTime to simple Date
 *
 *  @param $mysql_datetime mysql_date_time
 *  @since 0.1
 *  @return d.m.Y
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function datetime2date($mysql_datetime){
	return date("d.m.Y", strtotime($mysql_datetime));
}
/**
 * Converts MySQL-DateTime to simple Time
 *
 *  @param $mysql_datetime mysql_date_time
 *  @since 0.1
 *  @return H:i
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function datetime2time($mysql_datetime){
	return date("Hi", strtotime($mysql_datetime));
}
/**
 * Converts Date and Time to MySQL_DateTime
 *
 *  @param $date our Date (DD.MM.YYYY)
 *  @param $time our Time (HHii)
 *  @since 0.1
 *  @return YYYY-MM-DD HH:MM:SS
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function makeMySQL($date, $time){
	$dt = explode(".", $date);
	return $dt[2]."-".$dt[1]."-".$dt[0]." ".substr($time, 0,2).":".substr($time, 2,2).":00";
}

/**
 * Returns an Input.
 *
 *  @param $id ID of the input.
 *  @param $value Start Value of Input
 *  @since 0.1
 *  @return HTML input
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function getInput($id,$value){
	return "<input type=\"text\" id=\"".$id."\" value=\"".$value."\"/>";
}
/**
 * Returns the Value if a given $_GET or $_POST. May be Mandatory (Script dies if not there)
 *
 *  @param $par Parameter to get from GET or POST
 *  @param $mandatory Do we need this? Defaults to False
 *  @param $message What is the dying message? Defaults to ""
 *  @since 0.1
 *  @return value of $par
 *  @version 1.0
 *  @author Dominik Sigmund
 */
function getPar($par, $mandatory=false, $message=""){
	$r = "";
	if($_GET[$par]==""){
		if($_POST[$par]==""){
			if($mandatory){
				die($message);
			}
			else {
				$r="";
			}
		}
		else {
			$r=$_POST[$par];
		}
	}
	else {
		$r=$_GET[$par];
	}
	return $r;
}

function phpPost($url,$table,$worker,$fields){
	$postvars='';
	$sep='';
	foreach($fields as $key=>$value)
	{
		$postvars.= $sep.urlencode($key).'='.urlencode($value);
		$sep='&';
	}
	
	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL,$url."/php/worker/".$table."/".$worker);
	curl_setopt($ch,CURLOPT_POST,count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$result = curl_exec($ch);
	
	curl_close($ch);
	return $result;
}

function startsWith($haystack, $needle)
{
	return !strncmp($haystack, $needle, strlen($needle));
}

function endsWith($haystack, $needle)
{
	$length = strlen($needle);
	if ($length == 0) {
		return true;
	}

	return (substr($haystack, -$length) === $needle);
}

function filter($data,$time){
	
}

?>
