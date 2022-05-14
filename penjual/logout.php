<?php
// start a session
session_start();
 
// initialize a session variable
$_SESSION['name'] = 'cafe';
 
// unset a session variable
unset($_SESSION['name']);
echo"<script>alert('ANDA SUDAH LOGOUT');</script>";

echo"<script>location='index.php';</script>";
?>