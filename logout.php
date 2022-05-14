<?php
// start a session
session_start();
 
// initialize a session variable
$_SESSION['siswa'] = 'siswa';
 
// unset a session variable
unset($_SESSION['siswa']);
echo"<script>alert('ANDA SUDAH LOGOUT');</script>";

echo"<script>location='index.php';</script>";
?>