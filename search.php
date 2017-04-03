<?php
$connect = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("schedule_db");
mysql_query("set names utf8");

$_GROUP = $_REQUEST[_GROUP];

$qry = "select * from schedule_tb WHERE _GROUP = '$_GROUP';";
$result = mysql_query($qry);

$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\"?>\n";

while($obj = mysql_fetch_object($result))
{
	$_TITLE = $obj->_TITLE;
	$_TIME = $obj->_TIME;
	$_MSG = $obj->_MSG;


	$xmlcode .= "<node>\n";
	$xmlcode .= "<_TITLE>$_TITLE</_TITLE>\n";
	$xmlcode .= "<_TIME>$_TIME</_TIME>\n";
	$xmlcode .= "<_MSG>$_MSG</_MSG>\n";
	$xmlcode .= "</node>\n"; 					// SQL쿼리를 통해 받은 일정 값을 xml파일에 저장하기 위한 코드
}

$dir = "C:/APM_Setup/htdocs/Schedule-Server";
$filename = $dir."/search_result.xml";

file_put_contents($filename, $xmlcode);
?>