<?php

$phoneno=$_POST['pno'];
$enterans=$_POST['answer'];
	  //$pw=$_POST['pass'];
	 $con=mysqli_connect("localhost","root","");
      if($con){
	  mysqli_select_db($con,"online");
	 $i= mysqli_query($con,"SELECT answer FROM register WHERE mobile=$phoneno");
	    $rows=mysqli_num_rows($i);
		while($data=mysqli_fetch_assoc($i)){
				$answer=$data['answer'];
				
		}
		if($enterans==$answer)
		{
			echo "
			 
			
			<body>
			<form action='forgetpassword3.php' method='post'>
				Enter New Password:<br/><br/>
				<input type='password' id='newpass' name='newpass'/><br/><br/>
				confirmPassword:<br/><br/>
				<input type='password' id='newpass1'/>
				<input type='hidden' name='pno' value='$phoneno'/>
				<br/>
				<button type='submit'  onclick='return Validate()'>updatea</button></form>
			
			<script type='text/javascript'>
    function Validate() {
        var password = document.getElementById('newpass').value;
        var confirmPassword = document.getElementById('newpass1').value;
        if (password != confirmPassword) {
            alert('Passwords do not match.');
            return false;
        }
        return true;
    }
    </script></body>
			
			";
		}
		else{
			echo "wrong option";
			
		}
	  }
?>