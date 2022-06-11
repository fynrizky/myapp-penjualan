<?php

require_once "../../config/koneksi.php";

$id = $_POST['idbrg'];
$namabrg = $koneksi->real_escape_string($_POST['nama_barang']);
$satuan = $koneksi->real_escape_string($_POST['satuan']);
$hbeli = $koneksi->real_escape_string($_POST['harga_beli']);
$hjual = $koneksi->real_escape_string($_POST['harga_jual']);


$koneksi->query("UPDATE tb_barang SET nama_barang='$namabrg', satuan='$satuan', harga_beli='$hbeli', harga_jual='$hjual' WHERE id_brg = '$id' ");
echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=barang';</script>";
