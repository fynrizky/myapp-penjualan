<div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Update Barang</h6>
    </a>

    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> Update Barang</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <?php
                            if (isset($_POST['save'])) {
                                $barang->ubah_barang(
                                    $koneksi,
                                    $_POST['nama_barang'],
                                    $_POST['satuan'],
                                    $_POST['harga_jual'],
                                    $_POST['harga_beli'],
                                    $_GET['id']
                                );
                                // echo "<script>bootbox.alert('Data Terubah', function(){
                                // 	window.location = 'index.php?page=barang';
                                // });</script>";
                                // echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                // echo "<script>window.location.href='?page=barang';</script>";
                                echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                Data Berhasil Di Ubah
                                </div>";
                            }

                            $brg = $barang->ambil_barang($koneksi, $_GET['id']);

                            ?>

                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $brg['nama_barang']; ?>" class="form-control" placeholder="Masukan Nama" required="">
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" style="text-transform:uppercase" id="satuan" name="satuan" class="form-control" value="<?php echo $brg['satuan']; ?>" placeholder="Masukan Satuan" required="">
                                </div>
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" id="harga_jual" name="harga_jual" class="form-control" value="<?php echo $brg['harga_jual']; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="number" id="harga_beli" name="harga_beli" class="form-control" value="<?php echo $brg['harga_beli']; ?>" required="">
                                </div>

                                <button id="formbtn" class="btn btn-primary" name="save"><i class="fa fa-paper-plane"></i> Simpan</button>
                                <a href="?page=barang" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back to barang</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>