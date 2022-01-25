<?php 
include('db.php');

$username=$_POST['username'];
$password=$_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
$result= mysqli_query($conn,$sql);

$num= mysqli_num_rows($result);
	if ($num == 1) {
		header('location: aproducts.php');
} else {
	echo "<script type='text/javascript'>alert('Invalid Username or Password'); location.href='login.php';</script>"; 
	}
?>