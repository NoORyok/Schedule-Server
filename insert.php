<?php
$connect = mysql_connect("localhost", "root", "apmsetup"); 	// DB가 있는 주소
mysql_selectdb("schedule_db");								// DB 선택
mysql_query("set names utf8");								// 한글 입력이 가능하도록 utf8 설정

$_TITLE = $_REQUEST[_TITLE];
$_DATE = $_REQUEST[_DATE];
$_TIME = $_REQUEST[_TIME];
$_MSG = $_REQUEST[_MSG];
$_GROUP = $_REQUEST[_GROUP];
$_PW = $_REQUEST[_PW];


$qry = "insert into schedule_tb(_TITLE, _DATE, _TIME, _MSG, _GROUP, _PW) values('$_TITLE', '$_DATE', '$_TIME', '$_MSG', '$_GROUP', '$_PW');";
$result = mysql_query($qry);




if($result == true)
{
	$result = 1;
}

else {
	$result = 0;
}

$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\" ?>\n";	// xml파일에 출력할 코드
$xmlcode .= "<result>$result</result>\n";						// DB insert의 성공 여부를 확인하기 위한 result값을 xml에 반환
$dir = "C:/APM_Setup/htdocs/Schedule-Server";					// xml파일 경로
$filename = $dir."/insert_result.xml";

file_put_contents($filename, $xmlcode);							// $xmlcode내용을 xml파일에 저장

?>
