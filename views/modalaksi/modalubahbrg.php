<!-- Modal -->
<div class="modal fade" id="ubahbrg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-edit">
                <?php
                // if (isset($_POST['save'])) {
                //     $barang->ubah_barang(
                //         $koneksi,
                //         $_POST['nama_barang'],
                //         $_POST['satuan'],
                //         $_POST['harga_jual'],
                //         $_POST['harga_beli'],
                //         $_GET['id']
                //     );
                //     // echo "<script>bootbox.alert('Data Terubah', function(){
                //     // 	window.location = 'index.php?page=barang';
                //     // });</script>";
                //     echo "<script>alert('Data Berhasil Di Ubah');</script>";
                //     echo "<script>window.location.href='?page=barang';</script>";
                // }

                // $brg = $barang->ambil_barang($koneksi, $_GET['id']);

                ?>

                <form action="" id="forminputbrg" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="hidden" name="idbrg" id="idbrg">
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukan Nama" required="">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" style="text-transform:uppercase" id="satuan" name="satuan" class="form-control" placeholder="Masukan Satuan" required="">
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" id="harga_beli" name="harga_beli" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" id="harga_jual" name="harga_jual" class="form-control" required="">
                    </div>

                    <!-- <button id="formbtn" class="btn btn-primary" name="save"><i class="fa fa-paper-plane"></i> Simpan</button>
                    <a href="?page=barang" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back to barang</a> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <!-- <input type="submit" class="btn btn-primary" name="ubahbrg" value="Update"> -->
                <button type="submit" class="btn btn-primary" name="ubahbrg"><i class="fa fa-paper-plane"></i> Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- <script src="../assets/dist/js/jquery-1.10.2.js"></script> -->
<script type="text/javascript">
    $(document).on("click", "#ubahdatabrg", function() { // javascript tolong carikan yang ketika di klik id edit barang yang ada pada tombol edit lalu jalankan sebagai berikut
        var idbrg = $(this).data('id'); //data dari tombol edit barang yang data-id
        var namabrg = $(this).data('namabrg'); //data dari tombol edit barang yang data-nama
        var satuan = $(this).data('satuan'); //data dari tombol edit barang yang data-nama
        var hbeli = $(this).data('hbeli'); //data dari tombol edit barang yang data-harga
        var hjual = $(this).data('hjual'); //data dari tombol edit barang yang data-harga

        $("#modal-edit #idbrg").val(idbrg); //#modal-edit/id modal edit diambil dari div modal-body
        $("#modal-edit #nama_barang").val(namabrg);
        $("#modal-edit #satuan").val(satuan);
        $("#modal-edit #harga_beli").val(hbeli);
        $("#modal-edit #harga_jual").val(hjual);

    });


    $(document).ready(function(e) { //javascript siap jalankan
        $("#forminputbrg").on("submit", (function(e) { //javascript carikan id form yang ketika disubmit jalankan sebagai berikut
            e.preventDefault();
            $.ajax({
                url: 'views/modalproses/modalprosesubahbrg.php',
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