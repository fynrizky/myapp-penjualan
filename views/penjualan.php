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

    $kode = $penjualan->kode_otomatis($koneksi);
    $subtotal = $penjualan->hitung_total_sementara($koneksi, $kode);
    $cekbarang = $penjualan->cek_data_barangp($koneksi, $kode);


    if (isset($_POST['tambah'])) {
        $cekitem = $penjualan->cek_item($koneksi, $_GET['proses'], $_POST['item']);
        if ($cekitem === true) {
            $penjualan->tambah_penjualan_sementara($koneksi, $kode, $_GET['proses'], $_POST['item']);
            echo "<script>location='?page=penjualan';</script>";
        }
    }


    if (isset($_POST['save'])) {
        if ($_POST['totalbayar'] < $subtotal) {
            echo "<script>bootbox.alert('Total Bayar Tidak Cukup!', function(){

			});</script>";
        } else {
            $penjualan->simpan_penjualan($koneksi, $_POST['kdpenjualan'], $_POST['tglpenjualan'], $_POST['totalbayar'], $_POST['pelanggan'], $subtotal);
            $pen = $penjualan->ambil_kdpen($koneksi);
            $kodepen = $pen['kode_penjualan'];
            $kem = $_POST['totalbayar'] - $subtotal;
            $kembalian = number_format($kem);
            echo "<script>
				bootbox.confirm('Kembalian Rp. $kembalian, Lanjutkan Cetak Nota!', function(confirmed){
	        	if (confirmed) {
	        		window.location ='?page=penjualan';
	        	  	window.open('nota/cetaknotapenjualan.php?kodepenjualan=$kodepen', '_blank');
	        	}else{
	        		window.location ='?page=penjualan';
	        	}
	        });
			</script>";
        }
    }

    ?>

    <?php if (@$_GET['hapus']) { ?>
        <?php
        $penjualan->hapus_penjualan_sementara($koneksi, $_GET['hapus']);
        echo "<script>location='?page=penjualan';</script>";
        ?>
    <?php
} ?>

    <?php
    $kdbar = "";
    $namabr = "";
    if (isset($_GET['proses'])) {
        $bar = $datastok->ambil_barang_stok($koneksi, $_GET['proses']);
        $namabr = $bar['nama_barang'];
        $kdbar = $_GET['proses'];
    }
    ?>


    <section class="content-header">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">
                Penjualan
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
            <div class="col-lg-4">
                <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Barang</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">

                            <div class="panel panel-default">
                                <!-- panel -->

                                <div class="panel-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>ID Barang</label>
                                            <input type="text" class="form-control" id="kdbarang" name="kdbarang" disabled="disabled" value="<?php echo $kdbar; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" disabled="disabled" value="<?php echo $namabr; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Item</label>
                                            <input type="number" class="form-control" name="item" id="item" max="10000" min="0">
                                        </div>
                                        <div class="panel-footer">
                                            <?php if ($kdbar === "") : ?>
                                                <button class="btn btn-info btn-sm" name="tambah" id="tambah2" disabled="disabled"><i class="fa fa-plus"></i> Tambah</button>
                                            <?php endif ?>
                                            <?php if ($kdbar !== "") : ?>
                                                <button class="btn btn-info btn-sm" name="tambah" id="tambah2"><i class="fa fa-plus"></i> Tambah</button>
                                            <?php endif ?>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- tutup panel -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample3">
                        <div class="card-body">

                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="dataTable">
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
                                                $br = $penjualan->tampil_barang_sementara($koneksi, $kode);
                                                foreach ($br as $index => $data) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $index + 1; ?></td>
                                                        <td><?php echo ucwords($data['nama_barang']); ?></td>
                                                        <td><?php echo $data['satuan']; ?></td>
                                                        <td><?php echo number_format($data['harga']); ?></td>
                                                        <td><?php echo $data['item']; ?></td>
                                                        <td><?php echo number_format($data['total']); ?></td>
                                                        <td>
                                                            <a href="?page=penjualan&hapus=<?php echo $data['id_penjualan_sementara']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            ?>
                                            <tfoot>
                                                <td colspan="5" align="center"><strong>Subtotal</strong></td>
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
            </div>
        </div>
    </section>

    <section class="content-body">
        <div class="row">
            <div class="col-lg-4">

                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Penjualan</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample2">
                        <div class="card-body">

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <!--Form-->
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Kode Penjualan</label>
                                            <input type="text" class="form-control" name="kdpenjualan" id="kdpenjualan" maxlength="8" readonly="true" value="<?php echo $kode; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Penjualan</label>
                                            <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" name="tglpenjualan" id="tglpenjualan">
                                        </div>
                                        <div class="form-group">
                                            <label>Total Bayar</label>
                                            <input type="number" class="form-control" name="totalbayar" id="totalbayar">
                                        </div>
                                        <div class="form-group">
                                            <label>Pelanggan</label>
                                            <select class="form-control" name="pelanggan" id="pelanggan">
                                            <option value="">Pilih Pelanggan</option>
                                            <?php  
                                            $pl = $pelanggan->tampil_pelanggan($koneksi);
                                            foreach ($pl as $index => $data) {
                                            ?>
                                            <option value="<?php echo $data['id_pelanggan']; ?>"><?php echo $data['nama_pelanggan']; ?></option>
                                            <?php  
                                                }
                                            ?>
                                            </select>
					                    </div>


                                        <!--footer  -->
                                        <div class="col-md-12">
                                            <div class="panel-footer" align="center">
                                                <?php if ($cekbarang === true) : ?>
                                                    <button id="formbtn2" class="btn btn-primary btn-sm" name="save"><i class="fa fa-save"></i> Simpan</button>
                                                <?php endif ?>
                                                <?php if ($cekbarang === false) : ?>
                                                    <button id="formbtn2" class="btn btn-primary btn-sm" name="save" disabled="disabled"><i class="fa fa-save"></i> Simpan</button>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </form>
                                    <!--End Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8">
                <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Data Stok Barang</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardExample4">
                        <div class="card-body">

                            <!-- row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTable2">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama</th>
                                                    <th>Stok</th>
                                                    <th>Satuan</th>
                                                    <th>Harga Jual</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $brg = $penjualan->tampil_barang_penjualan($koneksi);
                                                foreach ($brg as $index => $data) {
                                                    ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo $index + 1; ?></td>
                                                        <td><?php echo $data['kode_barang']; ?></td>
                                                        <td><?php echo ucwords($data['nama_barang']); ?></td>
                                                        <!-- <td><?php echo $data['stok'] . '/' . $data['satuan']; ?></td> -->

                                                        <?php if ($data['stok'] <= 10) { ?>
                                                            <td><span class="badge badge-pill badge-danger" style="border-radius: 100px; font-size: 14px;"><i class="fa fa-frown fa-fw"></i> <?= ucwords($data['stok']); ?></span></td>
                                                        <?php } else { ?>
                                                            <td><span class="badge badge-pill badge-success" style="border-radius: 100px; font-size: 14px;"><i class="fa fa-smile fa-fw"></i> <?= ucwords($data['stok']); ?></span></td>
                                                        <?php } ?>

                                                        <td><?= strtoupper($data['satuan']); ?></td>
                                                        <td>Rp. <?php echo number_format($data['harga_jual']); ?>,-</td>
                                                        <td>
                                                            <a href="?page=penjualan&proses=<?php echo $data['id_brg']; ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Prosess</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div><!-- row tutup -->




                        </div>
                    </div>
                </div>
                <?php
                if (isset($_GET['proses'])) {
                    echo "<script>
        $('#item').focus();
		</script>";
                }
                ?>
            </div>
        </div>
    </section>

</body>

</html>