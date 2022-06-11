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

<?php 

$kode = $pembelian->kode_otomatis($koneksi);
$subtotal = $pembelian->hitung_total_sementara($koneksi,$kode);
$cekbarang = $pembelian->cek_data_barangp($koneksi,$kode);

if (isset($_POST['tambah'])) {
    $pembelian->tambah_barang_sementara($koneksi,$kode,$_POST['nama'],$_POST['satuan'],$_POST['hargab'],$_POST['item']);
    echo "<script>location='?page=tambahpembelian';</script>";
}
if (isset($_POST['save'])) {
    $pembelian->simpan_pembelian($koneksi,$_POST['kodepembelian'],$_POST['tglpembelian'],$_POST['supplier'],$subtotal);
    $pem = $pembelian->ambil_kdpem($koneksi);
    $kodepem = $pem['kode_pembelian'];
    echo "<script>
        bootbox.confirm('Lanjutkan Cetak Nota!', function(confirmed){
        if (confirmed) {
            window.location ='?page=tambahpembelian';
              window.open('nota/cetaknotapembelian.php?kodepembelian=$kodepem', '_blank');
        }else{
            window.location ='?page=tambahpembelian';
        }
    });
    </script>";
}


?>

    <?php if (@$_GET['hapusbs']) { ?>
    <?php 
    $pembelian->hapus_barang_sementara($koneksi, $_GET['hapusbs']);
    echo "<script>window.location.href='?page=tambahpembelian';</script>";
    ?>
    <?php 
} ?>


    <section class="content-header">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">
                Pembelian
            </h3>
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="float-right">
                        <a href="?page=tambahuser" class="btn btn-primary btn-sm ">
                            <i class="fa fa-plus"></i> Tambah User
                        </a>
                        <a href="cetak_fpdf_user.php" target="_blank" class="btn btn-default btn-sm ">
                            <i class="fa fa-print"></i> Print PDF
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <section class="content-body">
    <div class="row">
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Barang</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">

             <div class="panel panel-default"><!-- panel -->
			
			    <div class="panel-body">
				    <form method="POST">
					    <div class="form-group">
						    <label>Nama Barang</label>
						    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Barang">
					    </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" style="text-transform:uppercase" class="form-control" name="satuan" id="satuan" placeholder="Masukan Satuan">
                        </div>
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="number" class="form-control" name="hargab" id="hargab" min="0">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Item</label>
                            <input type="number" class="form-control" name="item" id="item" max="10000" min="0">
                        </div>
                            <div class="panel-footer">
                                <button class="btn btn-info btn-sm" name="tambah" id="tambah"><i class="fa fa-plus"></i> Tambah</button>
                            </div>
				    </form>
                </div>
            </div><!-- tutup panel -->

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Supplier</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample2">
                <div class="card-body">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="" method="POST">
                                <div class="form-group">
						            <label>Kode Pembelian</label>
						            <input type="text" class="form-control" name="kodepembelian" id="kodepembelian" maxlength="8" readonly="true" value="<?php echo $kode; ?>">
					            </div>
                                <div class="form-group">
						            <label>Tanggal Pembelian</label>
						            <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" name="tglpembelian" id="tglpembelian">
					            </div>
                                <div class="form-group">
						            <label>Supplier</label>
						            <select class="form-control" name="supplier" id="supplier">
							        <option value="">Pilih Supplier</option>
                                    <?php  
                                    $sp = $supp->tampilsupp($koneksi);
                                    foreach ($sp as $index => $data) {
                                    ?>
                                    <option value="<?php echo $data['id_supplier']; ?>"><?php echo $data['nama_supplier']; ?></option>
                                    <?php  
                                        }
							        ?>
						            </select>
					            </div>
                            <!-- </form> -->



                                <!--footer  -->
                                <div class="col-md-12">
                    
                                        <div class="panel-footer" align="center">
                                        <?php if ($cekbarang === true): ?>
                                                <button id="formbtnpem" class="btn btn-primary btn-sm" name="save"><i class="fa fa-save"></i> Simpan</button>
                                        <?php endif ?>
                                        <?php if ($cekbarang === false): ?>
                                                <button id="formbtnpem" class="btn btn-primary btn-sm" name="save" disabled="disabled"><i class="fa fa-save"></i> Simpan</button>
                                        <?php endif ?>
                                        </div>				
                                </div>
				        </form><!--End Form-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>

    <section class="content-body">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Data Pembelian</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample3">
                <div class="card-body">

                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        // if ($cekbarang === false) {
                                        //     echo "<tr><td colspan='7' align='center'>Data saat ini kosong</td></tr>";
                                        // }
                                        // else{
                                        $br = $pembelian->tampil_barang_sementara($koneksi,$kode);
                                        foreach ($br as $index => $data) {
                                    ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $data['nama_barangp']; ?></td>
                                        <td><?php echo $data['satuan']; ?></td>
                                        <td><?php echo number_format($data['harga_barangp']); ?></td>
                                        <td><?php echo $data['item']; ?></td>
                                        <td><?php echo number_format($data['total']); ?></td>
                                        <td>
                                            <a href="?page=tambahpembelian&hapusbs=<?php echo $data['id_barangp']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php } //}?>
                                    <!-- <tr class="active">
                                        <td colspan="5" align="center"><strong>Subtotal</strong></td>
                                        <td colspan="2"><?php echo number_format($subtotal); ?></td>
                                    </tr> -->
                                    <tfoot>
                                            <td colspan="5" style="text-align: center;"><strong>Subtotal</strong></td>
                                            <td colspan="2" style="color: blue;"><strong><?php echo number_format($subtotal); ?></strong></td>
                                    </tfoot>
                                </tbody>
		                    </table>

                            </div>

                        </div>
                    </div><!-- row tutup -->




                </div>
            </div>
        </div>
    </section>





</body>
                                            

</html> 