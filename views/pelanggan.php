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
        $pelanggan->hapus_pelanggan($koneksi, $id);
        echo "<script>window.location.href='?page=pelanggan';</script>";
        ?>
    <?php
} ?>

    <section class="content-header">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">
                Menu Pelanggan
            </h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-right">
                        <a href="?page=tambahpelanggan" class="btn btn-info btn-sm">
                            <i class="fa fa-plus"></i> Tambah Pelanggan
                        </a>
                        <button type="button" class="btn btn-primary btn-sm" id="tambahdatapelanggan" data-toggle="modal" data-target="#tambahpelanggan">
                            <i class="fa fa-plus"></i> Tambah Pelanggan (Modal)
                        </button>
                        <a href="cetak_fpdf_pelanggan.php" target="_blank" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print PDF
                        </a>
                    </div>
                </div>
            </div>
    </section>

    <?php require_once "modalaksi/modaltambahpelanggan.php"; ?>

    <section class="content-body">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
            </a>
            <!-- Card Content -Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggan</th>
                                            <th>No Telepon</th>
                                            <th>Alamat Pelanggan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php $query = $pelanggan->tampil_pelanggan($koneksi); ?>
                                        <?php foreach ($query as $q => $data) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= ucwords($data['nama_pelanggan']); ?></td>
                                                <td><?= ucwords($data['notelp']); ?></td>
                                                <td><?= ucwords($data['alamat_pelanggan']); ?></td>
                                                <td>
                                                    <a href="?page=ubahpelanggan&id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i> Update</a>
                                                    <a id="ubahdatapelanggan" data-toggle="modal" data-target="#ubahpelanggan" data-id="<?php echo $data['id_pelanggan']  ?>" data-namapl="<?php echo $data['nama_pelanggan']; ?>" data-notelppl="<?php echo $data['notelp']; ?>" data-alamatpl="<?php echo $data['alamat_pelanggan']; ?>"><button class="btn btn-outline-warning btn-sm"><i class="fa fa-pen"></i> </button></a>
                                                    <a href="?page=pelanggan&hapus=<?php echo $data['id_pelanggan']; ?>" class="btn btn-outline-danger btn-sm" id="alertHapus" onclick="return confirm('Yakin Ingin Di Hapus');"><i class="fa fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php require_once "modalaksi/modalubahpelanggan.php"; ?>

</body>

</html>