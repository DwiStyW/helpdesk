<?php
include "koneksi.php";
include "cek-login.php" ;
ini_set('date.timezone', 'Asia/Jakarta');
$no 	= $_GET['kd'];

$query = mysqli_query($conn, "DELETE FROM tb_user WHERE user_id='$no'");

if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'user.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'user.php'</script>";	
}
?>