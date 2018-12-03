<?php

$phoneno=$_POST['pno'];
	  //$pw=$_POST['pass'];
	 $con=mysqli_connect("localhost","root","");
      if($con){
	  mysqli_select_db($con,"online");
	 $i= mysqli_query($con,"SELECT * FROM register WHERE mobile=$phoneno");
	    $rows=mysqli_num_rows($i);
		if($i)
		{
			echo "<form action='forgetpassword2.php' method='post'>";
			echo "<select name='secret'>
                                <option value='1'>What is your nationality</option>
                                 <option value='2'>10th school name</option>
                                
                    </select><br/><br/>
            <label for='message'><b>Answer</b></label><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <textarea id='answer' name='answer' rows='1' cols='50'></textarea><br><br><br>";
			echo "<input type='hidden' name='pno' value='$phoneno'/>
				<input type='submit' value='ok'/>
			</form>";
			
		}
		
		
		
		
		/*$a= mysqli_query($con,"SELECT appeared FROM register WHERE username='$name' and password='$pw'");
		while($data=mysqli_fetch_assoc($a)){
				$aa=$data['appeared']; */
				
		}
		
?>