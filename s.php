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
</style>
<!--<script>
	var tim;
	var min=3;
	var sec=60;
	var f=new Date();
	
	function showtime()
	{
		if(parseInt(sec)>0){
			sec=parseInt(sec)-1;
			document.getElementById("showtime").innerHTML="your left time is:"+min+":"+sec+"";
			tim=setTimeout("showtime()",1000);
		}
		else{
			if(parseInt(sec)==0){
				min=parseInt(min)-1;
				document.getElementById("showtime").innerHTML="your left time is:"+min+":"+sec+"";
				if(parseInt(min)==-1){
					clearTimeout(tim);
					alert("time up");
					window.location.href="login.php";
				}
			
			else{
				sec=60;
				document.getElementById("showtime").innerHTML="your left time is:"+min+"Minutes:"+sec+"Seconds";
				tim=setTimeout("showtime()",1000);
			}
			}			
		}
		

	}
</script>
<body onload="showtime()" oncontextmenu="return false">


<div class="q" style="word-wrap:break-word">-->
<?php
$con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"online");
$num=mysqli_query($con,"SELECT time FROM testdetails");
$no=mysqli_fetch_assoc($num);
	$nn=$no['time']; 
echo "<script type='text/javascript'>
	var tim;
	var min=$nn-1;
	var sec=60;
	var f=new Date();
	function preback(){
	window.history.forward();
	} 
	setTimeout('preback()',0);
	window.unload=function(){null}
	function showtime()
	{
		if(parseInt(sec)>0){
			sec=parseInt(sec)-1;
			document.getElementById('showtime').innerHTML='your left time is:'+min+':'+sec+'';
			tim=setTimeout('showtime()',1000);
		}
		else{
			if(parseInt(sec)==0){
				min=parseInt(min)-1;
				document.getElementById('showtime').innerHTML='your left time is:'+min+':'+sec+'';
				if(parseInt(min)==-1){
					clearTimeout(tim);
					alert('time up');
					window.location.href='index.html';
				}
			
			else{
				sec=60;
				document.getElementById('showtime').innerHTML='your left time is:'+min+'Minutes:'+sec+'Seconds';
				tim=setTimeout('showtime()',1000);
			}
			}			
		}
		

	}
</script>
<body onload='showtime()'>


<div class='q' style='word-wrap:break-word'>";


//$rno=$_GET['rno'];
//echo "<b>$rno</b>";
//echo "<input type='hidden' name='rno' value='$rno'/>";
?>

 <div id="showtime" class="time"></div>
 
<form action="collect.php" method="post">

<?php 
	//$rno=$_GET['rno'];
	$con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"online");
  
   $sets=array(2,3,1,4,5,6,7,8,9,0);
   
   
   
   
   $n=0;
	for($i=0;$i<=9;$i++){
		$res=mysqli_query($con,"SELECT * FROM excel_data");
		$rows=mysqli_num_rows($res);
	   while($data=mysqli_fetch_assoc($res)){
	   $no=$data['qno'];
	   if($no%10==$sets[$i]){
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

   
   
	//echo "<input type='hidden' name='rn' value='$rno'/>";
	
   echo "<input class='submit' type='submit' value='submit'/>";
   
   
?>

</div>
 </form>
</body>
</html>