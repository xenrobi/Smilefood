<?php

$error=''; 

include "../config/koneksi.php";
if(isset($_POST['submit']))
{				
    // $username    = mysqli_real_escape_string($koneksi, $_POST['username']);
	$username	= mysqli_real_escape_string($koneksi, $_POST['username']);
    $password	= mysqli_real_escape_string($koneksi, $_POST['password']);
    

//penjual
$query2 = mysqli_query($koneksi, "SELECT * FROM cafe WHERE nama_cafe='$username' AND password='$password'");
if(mysqli_num_rows($query2) == 0)
{
    $error = "Username or Password is invalid";
}
else
{
    $row2 = mysqli_fetch_assoc($query2);
    $_SESSION['name']=$row2['nama_cafe'];
    $_SESSION['cafe'] = $row2['level'];
    $_SESSION['name'] = $row2['nama_cafe'];
    $_SESSION['owner'] = $row2['pemilik'];
    if($_SESSION['cafe'] == $row2['level'])
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