<html>
<body>
<?php
session_start();
$flag = 0;
$email=$pass="";
if (empty($_POST["email"])) 
	{
		echo "Email is required"."<br>";
	} 
	else 
	{
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$flag = 1; 
			echo "Invalid email format"."<br>"; 
		}
	}
	
if (empty($_POST["p2"])) 
	{
		echo "password is required"."<br>";
	} 
else 
	{
		$pass = test_input($_POST["p2"]);
		if (!preg_match("/^[a-zA-z0-9@#]+$/",$pass))
		{
			$flag = 1;
			echo "Only alphabets and numbers are allowed"."<br>"; 
		}
	}
	
	
function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
//Validtaion Ends Here


	
	$conn=mysqli_connect("localhost","root","","my_database");
	
		if(!$conn)
		{
			die("Connection failed: ".mysqli_connect_error($conn));
		}

	if($flag == 0)
	{
		
		$email=$_POST["email"];
		$pass=$_POST["p2"];
		$sql="SELECT email,password FROM signup";
		$result=mysqli_query($conn,$sql);
		
		$check="SELECT UserID,sav_plan FROM signup where email='$email';";
		$result2=mysqli_query($conn,$check);
		$row2=mysqli_fetch_assoc($result2);
		$_SESSION['saving']=$row2['sav_plan']; //storing saving plan type
		$_SESSION['userid']=$row2['UserID'];  // Storing userid on login
		if(mysqli_num_rows($result)>0)
		{
			$count=2;
			while($row=mysqli_fetch_assoc($result))
			{
				if($row["email"]==$email && $row["password"]==$pass)
				{
					echo "Welcome!!"."<br>";
					$count=0;
					$_SESSION["mail"]=$_POST["email"];  // Storing mail in session
					header('location: newtable.php');
					break;
				}
				
				if($row["email"]!=$email || $row["password"]!=$pass )
				{
					
					$count=1;
				}
						
			}
			if($count==1)
				echo "Email or password is incorrect"."<br>";

		}
		
		else
		{
			echo "0 results found"."<br>";
		}


	}	
	mysqli_close($conn);
	
?>
</body>
</html>
