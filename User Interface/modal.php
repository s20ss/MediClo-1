<html>
<?php
session_start();
if(!isset($_SESSION["userid"]))
{
	header('location: LOGIN.html');
}
// Validation Begins
$flag=0;
$task=$amount="";
if(empty($_POST["task"]))
{
	echo "Task field cannot be left empty"."<br>";
}
else 
	{
		$task = test_input($_POST["task"]);
		if (!preg_match("/^[a-zA-z ]+$/",$task))
		{
			$flag = 1;
			echo "Only alphabets are allowed for task"."<br>"; 
		}
	}
	
	if(empty($_POST["amt"]))
	{
		echo "Amount field cannot be left empty"."<br>";
	}
	
	else 
	{
		$amount = test_input($_POST["amt"]);
		if (!preg_match("/^[0-9]+$/",$amount))
		{
			$flag = 1;
			echo "Only numbers are allowed for amount"."<br>"; 
		}
	}
	
	
	


function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
//Validation Ends
$conn=mysqli_connect("localhost","root","","my_database");
	
		if(!$conn)
		{
			die("Connection failed: ".mysqli_connect_error($conn));
		}
		else
			echo"successful"."<br>";

	if($flag == 0)
	{
		session_start();
		$tsk=$_POST['task'];
		$amnt=$_POST['amt'];
		$cat=$_POST['category'];
		$time=$_POST['time'];
		$sess=$_SESSION['userid'];  // Taking userid from login
		$sess='hello'.$sess;
		echo $sess;
		
		$sql="INSERT INTO $sess(task,category,amount,dnt) VALUES ('$tsk','$cat',$amnt,'$time')";

		if(mysqli_query($conn,$sql))
		{
			echo "Record successfully created";
			header('location: newtable.php');
		}	
		
		else
		{
			echo "Error: ".$sql."<br>".mysqli_error($conn);
		}
		
		
	}	
	mysqli_close($conn);
	


?>
</html>