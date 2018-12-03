<?php
	session_start();
	$rno=$_GET['rno'];
	echo "<input type='hidden' name='rno' value='$rno'/>";
	$link=mysqli_connect("localhost","root","");
	mysqli_select_db($link,"online");
	$duration="";
	$res=mysqli_query($link,"select * from testdetails");
	while($row=mysqli_fetch_array($res)){
		$duration=$row["time"];
	}
	$_SESSION["duration"]=$duration;
	$_SESSION["start_time"]=date("Y-m-d H:i:s");
	$end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION["duration"].'minute',strtotime($_SESSION["start_time"])));
	$_SESSION["end_time"]=$end_time;
	echo "<script type='text/javascript'>
window.location='index11.php?rno=$rno';
</script>";

?>
