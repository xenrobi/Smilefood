<?php
// start a session
session_start();
 
// initialize a session variable
$_SESSION['username'] = 'admin';
 
// unset a session variable
unset($_SESSION['username']);
echo"<script>alert('ANDA SUDAH LOGOUT');</script>";

echo"<script>location='index.php';</script>";
?>