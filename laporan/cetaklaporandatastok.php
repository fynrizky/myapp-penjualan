<style type="text/css">
*{
font-family: Arial;
font-size: 12px;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
.container{
	margin-top: 10px;
	width: 780px;
	margin-left: auto;
	margin-right: auto;
}
table.grid{
width:20.4cm ;
font-size: 9pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
background: #F0F0F0;
border: 0.2mm solid #000;
text-align:center;
padding-left:0.2cm;
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border:0.2mm solid #000;
}
h1{
font-size: 18pt;
}
h2{
font-size: 14pt;
}
h3{
font-size: 10pt;
}
.header{
display: block;
width:20.4cm ;
margin-bottom: 0.3cm;
text-align: center;
margin-top: 10px;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:20cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:20cm ;
}
.page {
font-size:13px;
padding-top: 20px;
}
.footer{
	padding-top: 20px;
	margin-left: 600px;
}
</style>
<?php
error_reporting(0);
include 'class.crudlaporan.php';
$perusahaan = new Perusahaan();
$cetaklaporan = new Cetak_Laporan();
// if (isset($_GET['tgl1']) && isset($_GET['tgl2'])) {
// 	$dat = $cetaklaporan->laporan_pembelian_bulan($koneksi,$_GET['tgl1'],$_GET['tgl2']);
// }else{
// 	$dat = $cetaklaporan->laporan_semua_pembelian($koneksi);
// }
$dat = $cetaklaporan->laporan_data_stok_history($koneksi);
$per = $perusahaan->tampil_perusahaan($koneksi);
$namaper = $per['nama_perusahaan'];
$alamat = $per['alamat'];
$pemilik = $per['pemilik'];
// $kota = $per['kota'];
$judul_H = "CETAK LAPORAN STOK BARANG <br>";
$tgl = date('d-m-Y');
function myheader($judul_H,$namaper,$alamat){
echo  "<div class='header' align='center'>
					<h1 align='left'>".$namaper."</h1>
					<p align='left'>".$alamat."</p><br/><br/>
		  		<h2>".$judul_H."</h2>
		  	</div>
		<table class='grid' align='center'>
		<tr>
			<th width='3%'>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Satuan</th>
			<th>Stok Sebelum</th>
			<th>Stok Bertambah</th>
			<th>Stok Sesudah</th>
			<th>Tanggal Perubahan</th>
		</tr>";		
}
function myfooter(){
	echo "</table>";
}
	echo "<div class='container' align='center'>"; //center
	$page =1;
	
	foreach ($dat as $index => $data) {
		$no = $index + 1;
		
		if(($no % 25) == 1){
		   	if($index + 1 > 1){
		        myfooter();
		        echo "<div class='pagebreak'>
				<div class='page' align='center'>Hal - $page</div>
				</div>";
				$page++;
		  	}
		   	myheader($judul_H,$namaper,$alamat);
		}
		$tglperubahan = date_format(date_create($data['tanggal_perubahan']),'d-m-Y');
		$stokbertambah = $data['stok_sesudah'] - $data['stok_sblm'];
		echo "<tr>
				<td align='center'>$no</td>
				<td align='left'>$data[kode_barang]</td>
				<td align='left'>$data[nama_barang]</td>
				<td align='left'>$data[satuan]</td>
				<td align='left'>$data[stok_sblm]</td>
				<td align='left'>$stokbertambah</td>
				<td align='left'>$data[stok]</td>
				<td align='left'>$tglperubahan</td>
			</tr>";
	}
			
        myfooter();
        
	echo "<div class='footer'>
			<div>Jakarta, ".date('d-m-Y')."</div>
			<div style='margin-top:90px; margin-right:5px;'>$pemilik</div>
		</div>";
	echo "<div class='page' align='center'>Hal - ".$page."</div>";
	echo "</div>";
?>
<script type="text/javascript">
	window.print();
</script>