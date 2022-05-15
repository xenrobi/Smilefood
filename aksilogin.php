<?php

$error=''; 

include "config/koneksi.php";
if(isset($_POST['submit']))
{				
	$username	= mysqli_real_escape_string($koneksi, $_POST['username']);
	$password	= mysqli_real_escape_string($koneksi, $_POST['password']);
	

	
	
	
	//pelanggan
	$query3 = mysqli_query($koneksi, "SELECT * FROM siswa WHERE ni='$username' AND password='$password'");
	if(mysqli_num_rows($query3) == 0)
	{
		$error = "Username or Password is invalid";
	}
	else
	{
		$row3 = mysqli_fetch_assoc($query3);
		$_SESSION['kls']=$row3['kelas'];
		$_SESSION['ni']=$row3['ni'];
		$_SESSION['id']=$row3['id_kelas'];
		$_SESSION['no']=$row3['notelp'];
		$_SESSION['siswa'] = $row3['level'];
		

	
		if($_SESSION['siswa'] == $row3['level'])
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