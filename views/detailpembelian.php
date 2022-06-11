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
    if (isset($_GET['hapus'])) {
        $pembelian->hapus_pembelian($koneksi,$_GET['hapus']);
        echo "<script>location='?page=detailpembelian';</script>";
    }

?>
<section class="content-header">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h3 class="h3 mb-0 text-gray-800">
        Detail Pembelian
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <!-- <div class="float-right">
                <a href="?page=tambahsupp" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah Supplier
                </a>
                <a href="cetak_fpdf_supp.php" target="_blank" class="btn btn-default btn-sm">
                    <i class="fa fa-print"></i> Print PDF
                </a>
            </div> -->
        </div>
    </div>
</div>
</section>
   
<section class="content-body">
 <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
             <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
         </a>
         <!-- Card Content -Collapse -->
         <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
            <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pembelian</th>
                                <th>Tanggal Pembelian</th>
                                <!-- <th>ID Supplier</th> -->
                                <th>Supplier</th>
                                <th>Jumlah Pembelian</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $pem = $pembelian->tampil_pembelian($koneksi);
                                // $total = $laporan->hitung_total_pembelian($koneksi);
                                $total = 0;
                                foreach ($pem as $index => $data) {
                                    $jumlahb = $pembelian->hitung_item_pembelian($koneksi,$data['kode_pembelian']);
                            ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td>
                                    <!-- <a href="#" class="data-pem" id="<?= $data['id_pembelian']; ?>"> -->
                                        <?php echo ucwords($data['kode_pembelian']); ?>
                                    <!-- </a> -->
                                </td>
                                <td><?php echo $data['tgl_pembelian']; ?></td>
                                <!-- <td><?php echo $data['id_supplier']; ?></td> -->
                                <td><?php echo ucwords($data['nama_supplier']); ?></td>
                                <td><?php echo $jumlahb['jumlah']; ?></td>
                                <td style="color: blue;"><strong>Rp. <?php echo number_format($data['total_pembelian']); ?>,-</strong></td>
                                <td>
                                    <a href="nota/cetakdetailpembelian.php?kodepembelian=<?php echo $data['kode_pembelian']; ?>" target="_BLANK" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail</a>
                                    
                                    <?php 
                                    $cek = $pembelian->cek_hapuspembelian($koneksi,$data['kode_pembelian']);
                                    if ($cek === true): ?>
                                    <a href="?page=detailpembelian&hapus=<?php echo $data['kode_pembelian']; ?>" class="btn btn-danger btn-sm" id="alertHapus"><i class="fa fa-trash"></i> Hapus</a>                                        
                                    <?php endif ?>
                                    <?php if ($cek === false): ?>
                                    <a href="?page=detailpembelian&hapus=<?php echo $data['kode_pembelian']; ?>" class="btn btn-danger btn-sm" id="alertHapus" disabled="disabled"><i class="fa fa-trash"></i> Hapus</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php $total += $data['total_pembelian'] ?>
                            <?php } ?>
                        </tbody>
                            
                        <tfoot>
                                <td colspan="5"><strong>Totalnya </strong></td>
                                <td colspan="2" style="color: blue;"><strong>Rp. <?= number_format($total); ?>,-</strong></td>
                        </tfoot>
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
