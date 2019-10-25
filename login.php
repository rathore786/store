<?php
session_start();
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	echo "Welcome:" .$username."<br />";
	echo "<a href = 'logout.php'>Logout</a>";
}
else
{
	echo 'Please login!';
}
?>




