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

    <?php if (@$_GET['hapus']) { ?>
        <?php
        $id = $_GET['hapus'];
        $barang->hapus($koneksi, $id);
        echo "<script>window.location.href='?page=barang';</script>";
        ?>
    <?php
} ?>


    <section class="content-header">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">
                Menu Barang
            </h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-right">
                        <a href="?page=tambahbrg" class="btn btn-info btn-sm ">
                            <i class="fa fa-plus"></i> Tambah Barang
                        </a>
                        <button type="button" class="btn btn-primary btn-sm" id="tambahdatabrg" data-toggle="modal" data-target="#tambahbrg">
                            <i class="fa fa-plus"></i> Tambah Barang (Modal)
                        </button>
                        <a href="cetak_fpdf_transaksi.php" target="_blank" class="btn btn-default btn-sm ">
                            <i class="fa fa-print"></i> Print PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <?php require_once "modalaksi/modaltambahbrg.php"; ?>

    <section class="content-body">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">

                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <!-- <th>Keuntungan</th> -->
                                            <th>Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php $no = 1; ?>
                                        <?php $query = $barang->tampilbrg($koneksi); ?>
                                        <?php foreach ($query as $q => $data) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['kode_barang']; ?></td>
                                                <td><?php echo ucwords($data['nama_barang']); ?></td>
                                                <td><?php echo $data['satuan']; ?></td>
                                                <td>Rp. <?php echo number_format($data['harga_beli']); ?>,-</td>
                                                <td>Rp. <?php echo number_format($data['harga_jual']); ?>,-</td>
                                                <!-- <td>Rp. <?php echo number_format($data['harga_jual'] - $data['harga_beli']); ?>,-</td> -->
                                                <td>
                                                    <a href="?page=ubahbrg&id=<?php echo $data['id_brg']; ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i> Update</a>
                                                    <a id="ubahdatabrg" data-toggle="modal" data-target="#ubahbrg" data-id="<?php echo $data['id_brg']  ?>" data-namabrg="<?php echo $data['nama_barang']; ?>" data-satuan="<?= $data['satuan']; ?>" data-hbeli="<?= $data['harga_beli'] ?>" data-hjual="<?= $data['harga_jual'] ?>"><button class="btn btn-outline-warning btn-sm"><i class="fa fa-pen"></i> </button></a>
                                                    <a href="?page=barang&hapus=<?php echo $data['id_brg']; ?>" class="btn btn-outline-danger btn-sm" id="alertHapus" onclick="return confirm('Yakin Ingin Di Hapus');"><i class="fa fa-trash"></i> </a>
                                                </td>

                                            </tr>
                                        <?php
                                    } ?>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- row tutup -->




                </div>
            </div>
        </div>
    </section>

    <?php require_once "modalaksi/modalubahbrg.php"; ?>



</body>

</html>