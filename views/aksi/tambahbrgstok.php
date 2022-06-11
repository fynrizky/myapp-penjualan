<!-- <div class="float-right">
	<a href="?page=barang" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
</div> -->

<div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Stok</h6>
    </a>

    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> Tambah Barang Stok</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <?php 
                            if (isset($_POST['save'])) {
                                $datastok->simpan_barang_stok(
                                    $koneksi,
                                    $_POST['barang'],
                                    $_POST['stok']
                                );
                                echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                Data Tersimpan
                                </div>";
                            }
                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                               
                                <div class="form-group">
                                    <label for="stok">Nama Barang</label>
                                    <?php 
                                    $query = $barang->tampilbrg($koneksi);
                                    ?>
                                    <select name="barang" id="barang" class="form-control">
                                        <option value="">-PILIH</option>
                                    <?php foreach($query as $dt => $data ) : ?>
                                        <option value="<?= $data['id_brg'] ?>"><?= $data['nama_barang'] ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="stok">stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control" placeholder="Jumlah Stok" required="">
                                    
                                </div>
                               
                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <a href="?page=datastok" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 