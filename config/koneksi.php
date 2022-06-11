<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "myapk";


$koneksi = new mysqli("$host", "$user", "$pass", "$db");
if ($koneksi->connect_errno) {
	echo "<script>alert('Koneksi Gagal');</script>" . $koneksi->connect_error;
}
// else 
// {
// 	 echo "<script>alert('Koneksi berhasil');</script>";

// }
?>
<!-- END KONEKSI -->