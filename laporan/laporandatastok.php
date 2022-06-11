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
            $datastok->hapusstok($koneksi, $id);
            echo "<script>window.location.href='?page=datastok';</script>";
            ?>
    <?php
    } ?>


    <section class="content-header">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">
                Laporan Stok Barang
            </h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-right">
                        <!-- <a href="?page=tambahbrgstok" class="btn btn-primary btn-sm ">
                            <i class="fa fa-plus"></i> Tambah Barang
                        </a> -->
                        <a href="laporan/cetaklaporandatastok.php" target="_blank" class="btn btn-default btn-sm ">
                            <i class="fa fa-print"></i> Cetak
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
                <h6 class="m-0 font-weight-bold text-primary">Data Stok Barang</h6>
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
                                            <!-- <th>No</th> -->
                                            <!-- <th>Kode Barang</th> -->
                                            <!-- <th>Nama Barang</th> -->
                                            <!-- <th>Stok</th> -->
                                            <!-- <th>Satuan</th> -->
                                           
                                            <!-- <th>Harga</th> -->
                                           
                                            <!-- <th>Aksi</th> -->
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Stok Sebelum</th>
                                            <th>Stok Bertambah</th>
                                            <th>Stok Sesudah</th>
                                            <th>Tanggal Perubahan</th>
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php $no = 1; ?>
                                        <?php //$query = $datastok->tampilbrgstok($koneksi); ?>
                                        <?php $query = $historystok->tampilhistorystok($koneksi); ?>
                                        <?php foreach ($query as $q => $data) { ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['kode_barang']; ?></td>
                                                <td><?php echo ucwords($data['nama_barang']); ?></td>
                                                <td><?php echo $data['satuan']; ?></td>
                                                <td><?php echo $data['stok_sblm']; ?></td>
                                                <td><?php echo $data['stok_sesudah'] - $data['stok_sblm']; ?></td>
                                                <?php if ($data['stok'] <= 10) { ?>
                                                    <!-- <td><span class="badge badge-pill badge-danger" style="border-radius: 100px; font-size: 14px;"><i class="fa fa-frown fa-fw"></i><?= ucwords($data['stok']); ?></span></td> -->
                                                    <td><span class="badge badge-pill badge-danger" style="border-radius: 100px; font-size: 14px;"><?= ucwords($data['stok']); ?></span></td>
                                                <?php } else { ?>
                                                    <!-- <td><span class="badge badge-pill badge-success" style="border-radius: 100px; font-size: 14px;"><i class="fa fa-smile fa-fw"></i> <?= ucwords($data['stok']); ?></span></td> -->
                                                    <td><span class="badge badge-pill badge-success" style="border-radius: 100px; font-size: 14px;"><?= ucwords($data['stok']); ?></span></td>
                                                <?php } ?>
                                                <td><?php echo date_format(date_create($data['tanggal_perubahan']),'d-m-Y'); ?></td>
                                               


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