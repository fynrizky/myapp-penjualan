<!-- Modal -->
<div class="modal fade" id="ubahsupp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-edit">
                <?php
                // if (isset($_POST['save'])) {
                //     $supp->ubah_supp(
                //         $koneksi,
                //         $_POST['namasupplier'],
                //         $_POST['alamatsupplier'],
                //         $_GET['id']
                //     );
                //     echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                //     <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                //     Data Berhasil Di Ubah
                //     </div>";
                // }
                // $supplier = $supp->ambil_supp($koneksi, $_GET['id']);
                ?>

                <form action="" id="forminputsupp" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namasupplier">Nama Supplier</label>
                        <input type="hidden" id="idsupp" name="idsupp">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <!-- <input type="submit" class="btn btn-primary" name="ubahbrg" value="Update"> -->
                <button type="submit" class="btn btn-primary" name="ubahsupp"><i class="fa fa-paper-plane"></i> Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- <script src="../assets/dist/js/jquery-1.10.2.js"></script> -->
<script type="text/javascript">
    $(document).on("click", "#ubahdatasupp", function() { // javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
        var idsupp = $(this).data('id'); //data dari tombol edit barang yang data-id
        var namasupp = $(this).data('namasupp'); //data dari tombol edit barang yang data-nama
        var alamatsupp = $(this).data('alamatsupp'); //data dari tombol edit barang yang data-nama
        var notelpsupp = $(this).data('notelpsupp'); //data dari tombol edit barang yang data-nama


        $("#modal-edit #idsupp").val(idsupp); //#modal-edit/id modal edit diambil dari div modal-body
        $("#modal-edit #namasupplier").val(namasupp);
        $("#modal-edit #alamatsupplier").val(alamatsupp);
        $("#modal-edit #notelpsup").val(notelpsupp);


    });


    $(document).ready(function(e) { //javascript siap jalankan
        $("#forminputsupp").on("submit", (function(e) { //javascript carikan id form yang ketika disubmit jalankan sebagai berikut
            e.preventDefault();
            $.ajax({
                url: 'views/modalproses/modalprosesubahsupp.php',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(msg) { //kalau sukses tampilkan sebagai berikut
                    $('.table').html(msg); //javascript carikan yang classnya table dihtml
                }
            });
        }));
    })
</script>