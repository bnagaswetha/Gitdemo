<?php
session_start();


?>
<div id="response" class="timer"></div>
<script type="text/javascript">
setInterval(function(){
var xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET","response.php",false);
xmlhttp.send(null);
document.getElementById("response").innerHTML=xmlhttp.responseText;


	
},1000);


</script>

<html>
<head><title>question paper</title></head>
<style type="text/css">
div.q{
	height:auto;
	width:auto;
	
    }
label{
float:left;

}
.time{
	position:top|right;
}
div.opt{
  position:fixed;
  top:80;
  right:0;
  width:200px;
  height:900px;
  }

.submit{
    font-size:20px;
color:#0000e6;
padding:15px;
border-radius:10px;
}
div.qs{
	overflow:scroll;
	height:auto;
	width:auto;
}
.timer{
	position:fixed;
	top:0px;
	right:30px;
	width:auto;
	height:auto;
}	
</style>

<?php




echo "<div class='q' style='word-wrap:break-word'>";


//$rno=$_GET['rno'];
//echo "<b>$rno</b>";
//echo "<input type='hidden' name='rno' value='$rno'/>";
?>

 
 <div class="qs">
<form action="collect.php" method="post">

<?php 
	$rno=$_GET['rno'];
	$con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"online");
  
   $set1=array(2,3,1,4,5,6,7,8,9,0);
   $set2=array(0,9,8,7,6,5,4,3,2,1);
   $set3=array(5,6,3,0,1,8,9,4,3,4);
   $set4=array(0,1,9,2,8,3,7,4,6,5);
   $n=0;
   $valset=mysqli_query($con,"SELECT setno FROM register WHERE username='$rno'");
   $rollno1=mysqli_query($con,"SELECT rollo FROM register WHERE username='$rno'");
	//$i= mysqli_query($con,"INSERT INTO register(appeared) VALUES(1) WHERE username='$rno'");	
	$i=mysqli_query($con,"UPDATE register SET appeared=1 WHERE username='$rno'");
	while($data=mysqli_fetch_assoc($valset)){
				$set=$data['setno']; 
				
		}
		while($data1=mysqli_fetch_assoc($rollno1)){
				$rollno=$data1['rollo']; 
				
		}
   
   
   if($set==1){
	for($i=0;$i<=9;$i++){
		$res=mysqli_query($con,"SELECT * FROM excel_data");
		$rows=mysqli_num_rows($res);
	   while($data=mysqli_fetch_assoc($res)){
	   $no=$data['qno'];
	  
	   if($no%10==$set1[$i]){
	   $n=$n+1;
		$question=$data['question'];
		$o1=$data['op1'];
		$o2=$data['op2'];
		$o3=$data['op3'];
		$o4=$data['op4'];
		echo"</br>";
		echo "<B>".$n." : ".$question."</B></br>";
		echo "<label><input type='radio' name=$no value='1'/>".$o1."</label>";
	    echo "<label><input type='radio' name=$no value='2'/>".$o2."</label>";
	    echo "<label><input type='radio' name=$no value='3'/>".$o3."</label>";
		echo "<label><input type='radio' name=$no value='4'/>".$o2."</label></br>";
		//echo"<br>";
	   }
	   }
   }
   }
   if($set==2){
	for($i=0;$i<=9;$i++){
		$res=mysqli_query($con,"SELECT * FROM excel_data");
		$rows=mysqli_num_rows($res);
	   while($data=mysqli_fetch_assoc($res)){
	   $no=$data['qno'];
	   if($no%10==$set2[$i]){
	   $n=$n+1;
		$question=$data['question'];
		$o1=$data['op1'];
		$o2=$data['op2'];
		$o3=$data['op3'];
		$o4=$data['op4'];
		echo"</br>";
		echo "<B>".$n." : ".$question."</B></br>";
		echo "<label><input type='radio' name=$no value='1'/>".$o1."</label>";
	    echo "<label><input type='radio' name=$no value='2'/>".$o2."</label>";
	    echo "<label><input type='radio' name=$no value='3'/>".$o3."</label>";
		echo "<label><input type='radio' name=$no value='4'/>".$o2."</label></br>";
		//echo"<br>";
	   }
	   }
   }
   }
   if($set==3){
	for($i=0;$i<=9;$i++){
		$res=mysqli_query($con,"SELECT * FROM excel_data");
		$rows=mysqli_num_rows($res);
	   while($data=mysqli_fetch_assoc($res)){
	   $no=$data['qno'];
	   if($no%10==$set3[$i]){
	   $n=$n+1;
		$question=$data['question'];
		$o1=$data['op1'];
		$o2=$data['op2'];
		$o3=$data['op3'];
		$o4=$data['op4'];
		echo"</br>";
		echo "<B>".$n." : ".$question."</B></br>";
		echo "<label><input type='radio' name=$no value='1'/>".$o1."</label>";
	    echo "<label><input type='radio' name=$no value='2'/>".$o2."</label>";
	    echo "<label><input type='radio' name=$no value='3'/>".$o3."</label>";
		echo "<label><input type='radio' name=$no value='4'/>".$o2."</label></br>";
		//echo"<br>";
	   }
	   }
   }
   }
   if($set==4){
	for($i=0;$i<=9;$i++){
		$res=mysqli_query($con,"SELECT * FROM excel_data");
		$rows=mysqli_num_rows($res);
	   while($data=mysqli_fetch_assoc($res)){
	   $no=$data['qno'];
	   if($no%10==$set4[$i]){
	   $n=$n+1;
		$question=$data['question'];
		$o1=$data['op1'];
		$o2=$data['op2'];
		$o3=$data['op3'];
		$o4=$data['op4'];
		echo"</br>";
		echo "<B>".$n." : ".$question."</B></br>";
		echo "<label><input type='radio' name=$no value='1'/>".$o1."</label>";
	    echo "<label><input type='radio' name=$no value='2'/>".$o2."</label>";
	    echo "<label><input type='radio' name=$no value='3'/>".$o3."</label>";
		echo "<label><input type='radio' name=$no value='4'/>".$o2."</label></br>";
		//echo"<br>";
	   }
	   }
   }
   }

   
   
	echo "<input type='hidden' name='rn' value='$rno'/>";
	echo "<input type='hidden' name='rno1' value='$rollno'/>";
   echo "<input class='submit' type='submit' value='submit'/>";
   
   
?>
</div>
</div>
 </form>
 <script type="text/javascript">
	
	function preback(){
	window.history.forward();
	} 
	setTimeout("preback()",0);
	window.unload=function(){null}
	</script>
</body>
</html>