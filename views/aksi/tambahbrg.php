<!-- <div class="float-right">
	<a href="?page=barang" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
</div> -->

<div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
    </a>

    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> Tambah Barang</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <?php
                            if (isset($_POST['save'])) {
                                $barang->simpan_barang(
                                    $koneksi,
                                    $_POST['kdbarang'],
                                    $_POST['nama_barang'],
                                    $_POST['satuan'],
                                    $_POST['harga_jual'],
                                    $_POST['harga_beli']
                                );
                                echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                Data Tersimpan
                                </div>";
                            }
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="kdbarang">Kode Barang</label>
                                    <input type="text" style="text-transform:uppercase" id="kdbarang" name="kdbarang" class="form-control" placeholder="Masukan Kode Barang, Ex: BRG00001" maxlength="8" required="">
                                    <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukan Nama Barang" required="">
                                </div>
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" style="text-transform:uppercase" id="satuan" name="satuan" class="form-control" placeholder="Masukan Satuan" required="">
                                </div>
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" id="harga_jual" name="harga_jual" class="form-control" placeholder="Masukan Harga Jual" required="">
                                </div>
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="number" id="harga_beli" name="harga_beli" class="form-control" placeholder="Masukan Harga Beli" required="">
                                </div>
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?page=barang" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>