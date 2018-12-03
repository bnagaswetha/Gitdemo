<?php
session_start();
?>

<html>

<?php
$rno=$_POST['rn'];

	$rollno=$_POST['rno1'];
	$con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"online");
$num=mysqli_query($con,"SELECT no FROM testdetails");
$no=mysqli_fetch_assoc($num);
	$nn=$no['no'];
	

$n=array();

$ans1=mysqli_query($con,"SELECT ans FROM excel_data");
while($data=mysqli_fetch_assoc($ans1)){
	$n[]=$data['ans'];
	
}

    $rno=$_POST['rn'];

	$c=0;
	$u=array();
	
	for($i=1;$i<=$nn;$i++){
		if(isset($_POST[$i]))
		{$qt=$_POST[$i];
		
		array_push($u,$qt);
		}
        else
		{$qt=0;
			array_push($u,$qt);
			$c=$c+1;
		}
		}
		
	$count=0;
	
	for ($i=0;$i<$nn;$i++){
		if($n[$i]==$u[$i]){
			$count=$count+1;
		}
	}
	
	
	
	
	$i2=mysqli_query($con,"INSERT INTO result  VALUES('$rno',$count,$rollno)");
	$answered=$nn-$c;
	echo"<center><b>your exam completed successfully<br/><br/>your score is:";
	echo "<b>$count</b><br/><br/>";
	echo "Not answered:$c";
	echo "<br/></br>answered:$answered";
	echo "</b></center>";
	
	
	

?>
</html>