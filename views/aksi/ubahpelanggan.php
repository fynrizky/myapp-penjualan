<!-- <div class="float-right">
	<a href="?page=barang" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
</div> -->

<div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Update Pelanggan</h6>
    </a>

    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> Update Pelanggan</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <?php 
                            if (isset($_POST['save'])) {
                                $pelanggan->ubah_pelanggan(
                                    $koneksi,
                                    $_POST['namapelanggan'],
                                    $_POST['notelppl'],
                                    $_POST['alamatpelanggan'],
                                    $_GET['id']
                                );
                                echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                Data Berhasil Di Ubah
                                </div>";
                            }
                            $pl = $pelanggan->ambil_pelanggan($koneksi, $_GET['id']);
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="namapelanggan">Nama Pelanggan</label>
                                    <input type="text" id="namapelanggan" name="namapelanggan" value="<?= $pl['nama_pelanggan']; ?>" class="form-control" placeholder="Nama Pelanggan" required="">
                                    <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="notelppl">No Telp</label>
                                    <input type="text" id="notelppl" name="notelppl" value="<?= $pl['notelp']; ?>" class="form-control" maxlength="12" placeholder="Nomor Telepon" required="">
                                </div>
                                <div class="form-group">
                                    <label for="alamatpelanggan">Alamat</label>
                                    <textarea type="text" id="alamatpelanggan" name="alamatpelanggan" class="form-control" placeholder="Alamat" required=""><?=$pl['alamat_pelanggan'];?></textarea>
                                </div>
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?page=pelanggan" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 