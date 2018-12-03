<?php
session_start();
?>

<html>
<head>
<title>Adminstrative AreaOnline Quiz </title>

</head>

<body>
<?php
//extract($_POST);
if(isset($submit))
{

$name=$_POST['userid'];
	  $pw=$_POST['pass'];
$cn=mysql_connect("localhost","root","");
mysql_select_db("online",$cn)  or die("Could connect to Database");

	$rs=mysql_query("select * from admin where name='$name' and password='$pw'",$cn) or die(mysql_error());
	if(mysql_num_rows($rs)<1)
	{
		echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
		exit;
	
	}
	
	mysqli_close($conn);
}

?>
<?php

require 'Classes/PHPExcel/IOFactory.php';
$servername="localhost";
$username="root";
$password="";
$dbname="online";
if(isset($_POST['upload'])){
	$inputfilename=$_FILES['file']['tmp_name'];
	$exceldata=array();
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	
	if(!$conn){
		die("connection failed:".mysqli_connect_error());
		
	}
	try
	{
		$inputfiletype=PHPExcel_IOFactory::identify($inputfilename);
		$objReader=PHPExcel_IOFactory::createReader($inputfiletype);
		$objPMPExcel=$objReader->load($inputfilename);
	}
	catch(Exception $e)
	{
		die('Error loading file"'.pathinfo($inputfilename,PATHINFO_BASENAME).'":'.$e->getMessage());
		
	}
	$sheet=$objPMPExcel->getSheet(0);
	$highestRow=$sheet->getHighestRow();
	$highestColumn=$sheet->getHighestColumn();
	for($row=1;$row<=$highestRow;$row++)
	{
		$rowData=$sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,False);
		$sql="INSERT INTO excel_data VALUES(".$rowData[0][0].",'".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5]."',".$rowData[0][6].")";
		if(mysqli_query($conn,$sql)){
			$exceldata[]=$rowData[0];
		}
		else{
			echo "Error:".$sql."<br>".mysqli_error($conn);
		}
		
	}

mysqli_close($conn);
}
?>





<p class="head1">Welcome to Admistrative Area </p>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="file">
		<input type="submit" name="upload" value="Upload"></p></td>
</form>
<p align="center" class="style7">
<form action="questiontable.php" method="POST">
<table><tr>
        <td height="26"><div align="left"><strong> Enter Test Name </strong></div></td>
        <td>&nbsp;</td>
	  <td><input name="testname" type="text" id="testname"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter Total Question </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="totque" type="text" id="totque"></td>
    </tr>
	<tr>
      <td height="26"><div align="left"><strong>Enter Total Time </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="totime" type="text" id="totque"></td>
    </tr>
    
	
	
	<tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Add" ></td>
    </tr>
	
	</table>
	</form>
<!--<p align="center" class="head1"><form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="upload" value="Upload"></p>-->
</body>
</html>
