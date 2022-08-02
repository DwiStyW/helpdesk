<?php 
session_start();

$logged_in = false;

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['stathelp']) || empty($_SESSION['stathelp'])) {	
	//redirect ke halaman login
	header('location:../login.php?error=2');
	
} else {
	$logged_in = true;
}
?>