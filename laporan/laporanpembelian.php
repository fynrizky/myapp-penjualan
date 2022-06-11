<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>myContent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script> -->
</head>

<body>

<section class="content-header">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">
        Laporan Pembelian
    </h3>
    <div class="row">
        <div class="col-lg-12">
        <form method="POST" class="form-inline">
			<div class="col-lg">
				<div class="form-group">
					<input type="date" id="tgl1" value="<?= date('Y-m-d'); ?>" class="form-control" name="tgl1">
				</div>
			</div>
			<label>  Sampai  </label>
			<div class="col-lg">
				<div class="form-group">
					<input type="date" id="tgl2" value="<?= date('Y-m-d'); ?>" class="form-control" name="tgl2">
				</div>
			</div>
			<div class="form-group">
            <div class="float-right">
				<button id="formbtn" name="prosess" class="btn btn-default"><i class="fa fa-play-circle"></i> Prosess</button>
				<button class="btn btn-info" name="semua"><i class="fa fa-play-circle"></i> Semua Data</button>
            </div>
			</div>
		</form>
        </div>
    </div>
</div>
</section>
   
<section class="content-body">
 <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
             <h6 class="m-0 font-weight-bold text-primary">Laporan Pembelian</h6>
         </a>
         
         <!-- Card Content -Collapse -->
         <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
            <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card-heading" align="center">
                            <?php if (isset($_POST['prosess'])): ?>
                                <a href="laporan/cetaklaporanpembelian.php?tgl1=<?php echo $_POST['tgl1']; ?>&tgl2=<?php echo $_POST['tgl2']; ?>" target="_BLANK" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>
                            <?php endif ?>
                            <?php if (isset($_POST['semua'])): ?>
                                <a href="laporan/cetaklaporanpembelian.php?semua" target="_BLANK" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>
                            <?php endif ?>
                            <?php if (!isset($_POST['prosess']) && !isset($_POST['semua'])): ?>
                                <a href="#" class="btn btn-info btn-sm" disabled="disabled"><i class="fa fa-print"></i> Cetak</a>
                            <?php endif ?>
			        </div>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
						<tr class="active">
							<th>No</th>
							<th>Kode Pembelian</th>
							<th>Tanggal Pembelian</th>
							<th>Supplier</th>
							<th>Barang</th>
							<th>Satuan</th>
							
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
					<?php  
						if (isset($_POST['prosess'])) {
							$total = $laporan->hitung_total_pembelian_bulan($koneksi,$_POST['tgl1'],$_POST['tgl2']);
							$cek = $laporan->cek_pembelian_bulan($koneksi,$_POST['tgl1'],$_POST['tgl2']);
							if ($cek === false) {
								false;
							}
							else{
							$lapbl = $laporan->tampil_pembelian_bulan($koneksi,$_POST['tgl1'],$_POST['tgl2']);
							foreach ($lapbl as $index => $data) {
					?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo $data['kode_pembelian']; ?></td>
							<td><?php echo date_format(date_create($data['tgl_pembelian']),'d-m-Y'); ?></td>
							<td><?php echo $data['nama_supplier']; ?></td>
							<td><?php echo $data['nama_barang_beli']; ?></td>
							<td><?php echo $data['satuan']; ?></td>
							
							<td><?php echo $data['jumlah']; ?></td>
							<td>Rp. <?php echo number_format($data['harga_beli']); ?></td>
							<td>Rp. <?php echo number_format($data['subtotal']); ?></td>
						</tr>
					<?php
						}
					?>
					<?php
						}?>
						<tfoot>
							<td colspan="8" align="center"><strong>TOTAL</strong></td>
							<td style="color: blue;"><strong>Rp. <?php echo number_format($total); ?>,-</strong></td>
						</tfoot>
					<?php
					}
						elseif (isset($_POST['semua'])) {
							$total = $laporan->hitung_total_pembelian($koneksi);
							$cek = $laporan->cek_pembelian($koneksi);
							if ($cek === false) {
								false;
							}
							else{
							$lap = $laporan->tampil_pembelian($koneksi);
							foreach ($lap as $index => $data) {
					?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo $data['kode_pembelian']; ?></td>
							<td><?php echo date_format(date_create($data['tgl_pembelian']),'d-m-Y'); ?></td>
							<td><?php echo $data['nama_supplier']; ?></td>
							<td><?php echo $data['nama_barang_beli']; ?></td>
							<td><?php echo $data['satuan']; ?></td>
							
							<td><?php echo $data['jumlah']; ?></td>
							<td>Rp. <?php echo number_format($data['harga_beli']); ?></td>
							<td>Rp. <?php echo number_format($data['subtotal']); ?></td>
						</tr>
					<?php
						}
					?>
					<?php
						}?>
						<tfoot>
							<td colspan="8" align="center"><strong>TOTAL</strong></td>
							<td style="color: blue;"><strong>Rp. <?php echo number_format($total); ?>,-</strong></td>
						</tfoot>
					<?php
						}
						else{
					?>
						<tr>
							<td colspan="9" align="center">Pilih Opsi Tampil</td>
						</tr>
						<tr>
							<td colspan="8" align="center"><strong>TOTAL</strong></td>
							<td style="color: blue;"><strong></strong></td>
						</tr>
					<?php
						}
					?>
					</tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    
    </div>
</section>


</body>

</html> 
