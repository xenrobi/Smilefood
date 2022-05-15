<?php

$error=''; 

include "koneksi.php";
if(isset($_POST['submit']))
{				
	$username	= mysqli_real_escape_string($koneksi, $_POST['username']);
	$password	= mysqli_real_escape_string($koneksi, $_POST['password']);
	

	$query1 = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($query1) == 0)
	{
		$error = "Username or Password is invalid";
	}
	else
	{
		$row1 = mysqli_fetch_assoc($query1);
		$_SESSION['username']=$row1['username'];
		$_SESSION['admin'] = $row1['level'];
		
		if($_SESSION['admin'] == $row1['level'])
		{
			header("Location: index.php");
		}
		else
		{
			$error = "Failed Login";
		}
    }
}
    ?>