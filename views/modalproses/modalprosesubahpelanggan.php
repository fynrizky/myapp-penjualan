<?php

require_once "../../config/koneksi.php";

$id = $_POST['idpl'];
$namapelanggan = $koneksi->real_escape_string($_POST['namapelanggan']);
$notelp = $koneksi->real_escape_string($_POST['notelppl']);
$alamatpelanggan = $koneksi->real_escape_string($_POST['alamatpelanggan']);


$koneksi->query("UPDATE tb_pelanggan SET nama_pelanggan='$namapelanggan', notelp='$notelp', alamat_pelanggan='$alamatpelanggan' WHERE id_pelanggan = '$id' ");
echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=pelanggan';</script>";
