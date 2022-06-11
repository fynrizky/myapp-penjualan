<!-- Modal -->
<div class="modal fade" id="ubahpelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Pelanggan</h5>
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

                <form action="" id="forminputpelanggan" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namapelanggan">Nama Pelanggan</label>
                        <input type="hidden" id="idpl" name="idpl">
                        <input type="text" id="namapelanggan" name="namapelanggan" class="form-control" placeholder="Nama Pelanggan" required="">
                        <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                    </div>
                    <div class="form-group">
                        <label for="notelppl">No Telp</label>
                        <input type="text" id="notelppl" name="notelppl" class="form-control" maxlength="12" placeholder="No Telepon" required="">
                    </div>
                    <div class="form-group">
                        <label for="alamatpelanggan">Alamat</label>
                        <textarea type="text" id="alamatpelanggan" name="alamatpelanggan" class="form-control" placeholder="Alamat" required=""></textarea>
                    </div>
                    <!-- <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                    <a href="?page=supp" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <!-- <input type="submit" class="btn btn-primary" name="ubahbrg" value="Update"> -->
                <button type="submit" class="btn btn-primary" name="ubahpelanggan"><i class="fa fa-paper-plane"></i> Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- <script src="../assets/dist/js/jquery-1.10.2.js"></script> -->
<script type="text/javascript">
    $(document).on("click", "#ubahdatapelanggan", function() { // javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
        var idpl = $(this).data('id'); //data dari tombol edit barang yang data-id
        var namapl = $(this).data('namapl'); //data dari tombol edit barang yang data-nama
        var notelppl = $(this).data('notelppl'); //data dari tombol edit barang yang data-nama
        var alamatpl = $(this).data('alamatpl'); //data dari tombol edit barang yang data-nama


        $("#modal-edit #idpl").val(idpl); //#modal-edit/id modal edit diambil dari div modal-body
        $("#modal-edit #namapelanggan").val(namapl);
        $("#modal-edit #notelppl").val(notelppl);
        $("#modal-edit #alamatpelanggan").val(alamatpl);


    });


    $(document).ready(function(e) { //javascript siap jalankan
        $("#forminputpelanggan").on("submit", (function(e) { //javascript carikan id form yang ketika disubmit jalankan sebagai berikut
            e.preventDefault();
            $.ajax({
                url: 'views/modalproses/modalprosesubahpelanggan.php',
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