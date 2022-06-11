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
            $supp->hapus_supp($koneksi, $id);
            echo "<script>window.location.href='?page=supp';</script>";
            ?>
    <?php
    } ?>

    <section class="content-header">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">
                Menu Supplier
            </h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-right">
                        <a href="?page=tambahsupp" class="btn btn-info btn-sm">
                            <i class="fa fa-plus"></i> Tambah Supplier
                        </a>
                        <button type="button" class="btn btn-primary btn-sm" id="tambahdatasupp" data-toggle="modal" data-target="#tambahsupp">
                            <i class="fa fa-plus"></i> Tambah Supplier (Modal)
                        </button>
                        <a href="cetak_fpdf_supp.php" target="_blank" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print PDF
                        </a>
                    </div>
                </div>
            </div>
    </section>

    <?php require_once "modalaksi/modaltambahsupp.php"; ?>

    <section class="content-body">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Data Supp</h6>
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
                                            <th>Nama Supplier</th>
                                            <th>Alamat Supplier</th>
                                            <th>No Telp Supplier</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php $query = $supp->tampilsupp($koneksi); ?>
                                        <?php foreach ($query as $q => $data) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= ucwords($data['nama_supplier']); ?></td>
                                                <td><?= ucwords($data['alamat_supplier']); ?></td>
                                                <td><?= ucwords($data['no_telp']); ?></td>
                                                <td>
                                                    <a href="?page=ubahsupp&id=<?php echo $data['id_supplier']; ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i> Update</a>
                                                    <a id="ubahdatasupp" data-toggle="modal" data-target="#ubahsupp" data-id="<?php echo $data['id_supplier']  ?>" data-namasupp="<?php echo $data['nama_supplier']; ?>" data-alamatsupp="<?php echo $data['alamat_supplier']; ?>" data-notelpsupp="<?php echo $data['no_telp']; ?>"><button class="btn btn-outline-warning btn-sm"><i class="fa fa-pen"></i> </button></a>
                                                    <a href="?page=supp&hapus=<?php echo $data['id_supplier']; ?>" class="btn btn-outline-danger btn-sm" id="alertHapus" onclick="return confirm('Yakin Ingin Di Hapus');"><i class="fa fa-trash"></i> </a>
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
    <?php require_once "modalaksi/modalubahsupp.php"; ?>

</body>

</html>