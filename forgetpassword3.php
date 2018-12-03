<?php

$phoneno=$_POST['pno'];
	  $pw=$_POST['newpass'];
	 $con=mysqli_connect("localhost","root","");
      if($con){
	  mysqli_select_db($con,"online");
	 $i= mysqli_query($con,"UPDATE register SET password='$pw' WHERE mobile=$phoneno");
	  if($i)
	  {
		  echo "Password updated successfully";
		  echo "
		  <form action='user.html' method='post'>
		  <input type='submit' value='ok'/>
		  </form>
		  ";
	  }		  
		}
		
?>