

<form method="post" action="test.php">
Username:<input type="email" name="email"><br />
Password:<input type="text" name="password"><br />
<input type="submit" name="btn"><br />
<input type="checkbox" name="remme" value="1">Remember me
</form>



<?php 
error_reporting(0);
session_start();

$email = $_POST['email'];
$pass = $_POST['password'];
$submit = $_POST['btn'];
$remember = $_POST['remme'];


	
if($submit == true)
{
	$con = mysqli_connect('localhost','root','','test');
	if(!$con)
	{
		echo "server not connected";
	}
	
	$query = "select * from user where Email = '$email' and Password = '$pass'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	
		$dbusername = $row['Username'];
		$dbemail = $row['Email'];
		$dbpassword = $row['Password'];
				
	
	if($email == $dbemail && $pass == $dbpassword)
	{
		if(!empty($remember))
		{
			$_SESSION['username'] = $dbusername;
		setcookie('username',$email,time()+ 0*10*0*0);
		
		}
	else
	{
		$_SESSION['username'] = $dbusername;
	}
				
				header("Location:login.php");
	
	}
	else
	{
		echo "Incorrect username/password!";
	}
	
}
?>
