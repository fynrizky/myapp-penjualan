<!-- Modal -->
<div class="modal fade" id="tambahbrg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                    // echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                    //             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    //             Data Tersimpan
                    //             </div>";

                    echo "<script>alert('Data Berhasil Di Tambahkan');</script>";
                    echo "<script>window.location.href='?page=barang';</script>";
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
                    <!-- <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button> -->
                    <!-- <a href="?page=barang" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>