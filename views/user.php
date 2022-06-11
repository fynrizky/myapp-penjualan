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
        $users->hapus_user($koneksi, $id);
        echo "<script>window.location.href='?page=user';</script>";
        ?>
    <?php
} ?>


    <section class="content-header">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">
                Menu User
            </h3>
            <div class="row">
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
            </div>
        </div>
    </section>

    <section class="content-body">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
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
                                            <th>User</th>
                                            <th>Nama Lengkap</th>
                                            <th>Level User</th>
                                            <th>Pict</th>
                                            <th>Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php $no = 1; ?>
                                        <?php $query = $users->tampiluser($koneksi); ?>
                                        <?php foreach ($query as $q => $data) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo ucwords($data['username']); ?></td>
                                                <td><?php echo ucwords($data['nama_user']); ?></td>
                                                <td><?php echo ucwords($data['level'] == 1 ? "admin" : ($data['level'] == 2 ? "gudang" : "pimpinan")); ?></td>
                                                <td>
                                                    <img src="assets/mycss/img/<?php echo $data['image']; ?>" width="70px">
                                                </td>

                                                <td>
                                                    <a href="?page=ubahuser&id=<?php echo $data['id_users']; ?>" class="btn btn-outline-warning btn-sm"><i class="fa fa-pen"></i> </a>
                                                    <a href="?page=user&hapus=<?php echo $data['id_users']; ?>" class="btn btn-outline-danger btn-sm" id="alertHapus" onclick="return confirm('Yakin Ingin Di Hapus');"><i class="fa fa-trash"></i> </a>
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





</body>

</html>