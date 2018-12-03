<?php
session_start();
session_destroy();

?>
<html>
<head>
<script type="text/javascript">
	
	function preback(){
	window.history.forward();
	} 
	setTimeout("preback()",0);
	window.unload=function(){null}
	</script>
</head>
</html>
<?php
 
  
	  if(isset($_POST['submit']))
  {
	 $test=$_POST['testname'];
	  $qno=$_POST['totque'];
	  $time=$_POST['totime'];
	 $con=mysqli_connect("localhost","root","");
      if($con){
	  mysqli_select_db($con,"online");
	 $i= mysqli_query($con,"INSERT INTO testdetails VALUES('$test',$qno,$time)");
	    
		
	   if($i){
		   echo "test added successfully";
		   echo"<form action='index.html' method='get'>";
		   echo "<input type='submit' value='exit'/>";
		   
		   echo"</form>";
		   
	   }
	   
	   else
	   {
		   
		 echo "please enter correct details";
		 echo"<form action='adlogin.php' method='get'>";
		  echo "<input type='submit' value='help'/>";
		   echo"</form>";
	   }
	 }
  }
  
?>
