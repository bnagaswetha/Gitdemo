<?php
 
  
	  $name=$_POST['userid'];
	   $rno=$_POST['rno'];
	   echo "$rno";
	  $pw=$_POST['pass'];
	  $email=$_POST['email'];
	  $mobile=$_POST['mobile'];
	  $sec=$_POST['secret'];
	  $ans=$_POST['answer'];
	  if($rno%4==1)
	  {
		  $set=1;
	  }
	  if($rno%4==2)
	  {
		  $set=2;
	  }
	  if($rno%4==3)
	  {
		  $set=3;
	  }
	  if($rno%4==0)
	  {
		  $set=4;
	  }
	  $con=mysqli_connect("localhost","root","");
      if($con){
	  mysqli_select_db($con,"online");
	  
	 $i= mysqli_query($con,"INSERT INTO register(username,password,email,mobile,securequestion,answer,setno,rollo) VALUES('$name','$pw','$email',$mobile,'$sec','$ans',$set,$rno)");
	  if($i)
	  {
		  echo "updated";
	  }		  
	   
	  } 
?>
<html>
<head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="navbar.css" rel="stylesheet" type="text/css">
        <link href="body.css" rel="stylesheet" type="text/css">
        <style>
            body{
               background-image: url("userbackground.jpg")
            }
            </style>
    </head>
<body bgcolor=""><h2>

	   <ul class="normal">
        <li><h1 style="color:white"><b>You are registered successfully</b></h1></li>
        </ul>
        <ul>
            <li><a href="index.html"><b>HomePage</b></a></li>
           <li><a href="admin.html"><b>Admin</b></a></li>
            <li><a href="user.html"><b>User</b></a></li>
            <li><a href="register.html"><b>Register</b></a></li>
        </ul>
</html>