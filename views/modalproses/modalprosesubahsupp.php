<?php

require_once "../../config/koneksi.php";

$id = $_POST['idsupp'];
$namasupp = $koneksi->real_escape_string($_POST['namasupplier']);
$alamatsupp = $koneksi->real_escape_string($_POST['alamatsupplier']);
$notelpsup = $koneksi->real_escape_string($_POST['notelpsup']);


$koneksi->query("UPDATE tb_supplier SET nama_supplier='$namasupp', alamat_supplier='$alamatsupp', no_telp='$notelpsup' WHERE id_supplier = '$id' ");
echo "<script>alert('Data Berhasil Di Ubah');window.location.href='?page=supp';</script>";
