<!-- Modal -->
<div class="modal fade" id="tambahsupp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_POST['save'])) {
                    $supp->simpan_supp(
                        $koneksi,
                        $_POST['namasupplier'],
                        $_POST['alamatsupplier'],
                        $_POST['notelpsup']
                    );
                    // echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                    //             <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    //             Data Tersimpan
                    //             </div>";
                    echo "<script>alert('Data Berhasil Di Tambahkan');</script>";
                    echo "<script>window.location.href='?page=supp';</script>";
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
                    <!-- <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                    <a href="?page=supp" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a> -->


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