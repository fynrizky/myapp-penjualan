<div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Update Barang Stok</h6>
    </a>

    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> Update Barang Stok</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <?php 
                            if (isset($_POST['save'])) {
                                $datastok->ubah_barang_stok(
                                    $koneksi,
                                    $_POST['stok'],
                                    $_POST['tambahstok'],
                                    $_GET['id']
                                );
                                // echo "<script>bootbox.alert('Data Terubah', function(){
                                // 	window.location = 'index.php?page=barang';
                                // });</script>";
                                echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                echo "<script>window.location.href='?page=datastok';</script>";
                            }

                            $brg = $datastok->ambil_barang_stok2($koneksi, $_GET['id']);

                            ?>

                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                            <!-- <div class="form-group">
                                    <label for="barang">Nama Barang</label>
                                    <?php 
                                    $query = $barang->tampilbrg($koneksi);
                                    ?>
                                    <select name="barang" id="barang" class="form-control">
                                        <option value="">-PILIH</option>
                                    <?php foreach($query as $dt => $data ) : ?>
                                        <option value="<?= $data['id_brg'] ?>"><?= $data['nama_barang'] ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="stok">stok sekarang</label>
                                    <input type="number" id="stok" name="stok" class="form-control" readonly="" value="<?= $brg['stok'] ?>" placeholder="Jumlah Stok" required="">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="tambahstok">+ stok</label>
                                    <input type="number" id="tambahstok" name="tambahstok" class="form-control" placeholder="Jumlah Stok" required="">
                                    
                                </div>
            
                                <button id="formbtn" class="btn btn-primary" name="save"><i class="fa fa-paper-plane"></i> Simpan</button>
                                <a href="?page=datastok" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back to barang</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 