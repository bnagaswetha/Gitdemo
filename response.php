<?php
session_start();
$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION["end_time"];

$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);

$differenceinseconds=$timesecond-$timefirst;

$time=gmdate("i:s",$differenceinseconds);
echo $time;
if($time=="00:00"){
	echo "enede";
	header("location: ended.php");
}

?>