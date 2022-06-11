<!-- <div class="float-right">
	<a href="?page=barang" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
</div> -->

<div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Supplier</h6>
    </a>

    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> Tambah Supplier</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <?php
                            if (isset($_POST['save'])) {
                                $supp->simpan_supp(
                                    $koneksi,
                                    $_POST['namasupplier'],
                                    $_POST['alamatsupplier'],
                                    $_POST['notelpsup']
                                );
                                echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                Data Tersimpan
                                </div>";
                            }
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="namasupplier">Nama Supplier</label>
                                    <input type="text" id="namasupplier" name="namasupplier" class="form-control" placeholder="Nama Supplier" required="">
                                    <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="alamatsupplier">Alamat</label>
                                    <textarea type="text" id="alamatsupplier" name="alamatsupplier" class="form-control" placeholder="Alamat" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="notelppl">No Telp Supp</label>
                                    <input type="text" id="notelpsup" name="notelpsup" class="form-control" maxlength="12" placeholder="No Telepon" required="">
                                </div>
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?page=supp" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>