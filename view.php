<head>
<meta http-equiv="content-Type" content="text/html" charset="utf-8">
</head>


<?php
$connect = mysql_connect("127.0.0.1", "root", "apmsetup");
mysql_selectdb("schedule_db");
mysql_query("set names utf8");

$sql= "SELECT * FROM schedule_tb WHERE date(_DATE) = date(now())";
$rs =  mysql_query($sql, $connect);

echo "TODAY-";
echo date("Y/m/d")."-";
echo date("H-i") ."-";

echo "Today's Schedule-";

while($info=@mysql_fetch_array($rs)){
	echo $info['_TITLE']," ", $info['_TIME']," ", $info['_MSG'],"-";
}



mysql_close($connect);

?>