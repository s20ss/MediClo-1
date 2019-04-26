<html>

<?php
session_start();
$flag = 0;
	//Validation begins
	if(empty($_POST["name"]))
	{
		echo "Name field cannot be left empty"."<br>";
	}
	else
	{
		$name=test_input($_POST["name"]);
		if(!preg_match("/^[a-zA-Z 0-9]+$/",$name))
		{
			$flag = 1;
			echo "Name contains only alphabets"."<br>";	
		}
	}
	
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
	
	if (empty($_POST["p1"])) 
	{
		echo "password is required"."<br>";
	} 
	else 
	{
		$pass = test_input($_POST["p1"]);
		if (!preg_match("/^[a-zA-z0-9@#]+$/",$pass))
		{
			$flag = 1;
			echo "Only alphabets and numbers are allowed"."<br>"; 
		}
	}
	
	if($_POST["p1"]!=$_POST["cp1"])
	{
		$flag = 1;
		echo "Password Does not match"."<br>";
	}
	
	if(empty($_POST["phno"]))
	{
		$flag = 1;
		echo "Phone Number is required"."<br>";
	}
	else
	{
		$ph=test_input($_POST["phno"]);
		if(!preg_match("/\b[0-9]*\b/",$ph))
		{
			$flag = 1;
			echo "Only numbers are allowed"."<br>";
		}
	}
	
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	
	// Validation part ends here
	
	
	
		$conn=mysqli_connect("localhost","root","","my_database");
	
		if(!$conn)
		{
			die("Connection failed: ".mysqli_connect_error($conn));
		}
		else
			echo "Connected successfully";
	if($flag == 0)
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['p1'];
		$ph=$_POST['phno'];
		$sav=$_POST['savplan'];
		
		$check="SELECT email FROM signup";
		$result=mysqli_query($conn,$check);
		
		if(mysqli_num_rows($result)>0)
		{
			
			while($row=mysqli_fetch_assoc($result))
			{
				
				if($row["email"]==$email)
				{
					echo "Email already exist"."<br>";
					
				}
			}
		}
			// Inserting the signup data
			$sql="INSERT INTO signup(name,email,password,phno,sav_plan) VALUES('$name','$email','$pass',$ph,'$sav')";
			
			if(mysqli_query($conn,$sql))
			{
				echo "Record successfully created";
				                                                         
				$tab="SELECT UserID FROM signup WHERE email='$email'";
				$res=mysqli_query($conn,$tab);
		
				$row2=mysqli_fetch_assoc($res);
				$user='hello'.$row2['UserID'];
				
				// Creating table for each user
				
				$query="CREATE TABLE `{$user}`                                                 
				(
					ID int PRIMARY KEY AUTO_INCREMENT,
					task varchar(30),
					category varchar(30),
					amount int,
					dnt varchar(30)
				)";
				echo $query;
				
				if (mysqli_query($conn, $query))
				{
					echo "Table MyGuests created successfully";
					header('location: LOGIN.html');
				}
				
				else 
				{
					echo "Error creating table: " . mysqli_error($conn);
				}
				
			}
			else
			{
				echo "Error: ".$sql."<br>".mysqli_error($conn);
			}
		
	}	
	mysqli_close($conn);
	
?>
</html>