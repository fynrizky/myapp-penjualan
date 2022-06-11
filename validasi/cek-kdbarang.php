<?php  
	require_once "../config/koneksi.php";
	// if (isset($_GET['kdbarang'])) {
		
		$kd = $_GET['kdbarang'];
		//Checks if the username is available or not
		$result = $koneksi->query("SELECT kode_barang FROM tb_barang WHERE kode_barang='$kd'");
		$jum = $result->num_rows;
		if ($jum >= 1) {
			echo "<span style='color:red; padding-left:4px;'><i class='fa fa-danger'></i> Kode Barang Sudah Tersedia</span>";
		}
		else{
			echo "";
		}
	//  }	
?>