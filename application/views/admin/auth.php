<?php

session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$dat = mysqli_query($conn, "SELECT * from tb_user where username='$username' AND password='$password'");
$datar = mysqli_fetch_array($dat);
$cek  = mysqli_num_rows($dat);
 
if($cek > 0){
	// kalau username dan password sudah terdaftar di database
	// buat session dengan nama username dengan isi nama user yang login
   
	$_SESSION['username'] = $username;
	$_SESSION['role']  	  = $datar['role'];
	$_SESSION['user_id']  = $datar['user_id'];
	$_SESSION['divisi']   = $datar['divisi'];
	$_SESSION['stathelp']  = "OKEE";
	
	if ($_SESSION['role']=='user'){
		header('location:inputtiket.php');
	} else {
	// redirect ke halaman users [menampilkan semua users]
		header('location:index.php');
	}	
} else {
	// kalau username ataupun password tidak terdaftar di database
	
	header('location:../login.php?error=1');
}
?>