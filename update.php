<?php
$connect = mysql_connect("localhost", "root", "apmsetup");
mysql_selectdb("schedule_db");
mysql_query("set names utf8");

$_TITLE = $_REQUEST[_TITLE];
$_DATE = $_REQUEST[_DATE];
$_TIME = $_REQUEST[_TIME];
$_MSG = $_REQUEST[_MSG];
$_GROUP = $_REQUEST[_GROUP];
$_PW = $_REQUEST[_PW];

$qry = "UPDATE schedule_tb SET _TITLE = '$_TITLE', _DATE = '$_DATE', _TIME = '$_TIME', _MSG = '$_MSG', _GROUP = '$_GROUP' WHERE  _PW = '$_PW';";
$result = mysql_query($qry);


if($result == true)
{
	$result = 1;
}

else {
	$result = 0;
}

$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\" ?>\n";
$xmlcode .= "<result>$result</result>\n";
$dir = "C:/APM_Setup/htdocs/Schedule-Server";
$filename = $dir."/update_result.xml";
file_put_contents($filename, $xmlcode);

?>