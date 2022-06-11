                <!-- <div class="float-right">
	<a href="?page=barang" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
</div> -->

                <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
                    </a>

                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title"> Tambah User</h3>
                                        </div>
                                        <hr />
                                        <div class="box-body">
                                            <?php 
                                            if (isset($_POST['save'])) {

                                                $username = $_POST['username'];
                                                $namauser = $_POST['namauser'];
                                                $password = $_POST['password'];
                                                $password2 = $_POST['password2'];
                                                $level = $_POST['level'];
                                                $image = "default.jpg";

                                                $query = $koneksi->query("SELECT * FROM tb_users WHERE username = '$username'");
                                                if ($query->num_rows == 1) {
                                                    echo "<script>alert('Username Sudah Tersedia');</script>";
                                                    echo "<script>window.location.href='?page=tambahuser';</script>";
                                                    return false;
                                                }

                                                if ($password2 != $password) {
                                                    echo "<script>alert('Password tidak Cocok');</script>";
                                                    echo "<script>window.location.href='?page=tambahuser';</script>";
                                                    return false;
                                                }

                                                $password = password_hash($password, PASSWORD_DEFAULT);

                                                $users->simpan_user(
                                                    $koneksi,
                                                    $username,
                                                    $namauser,
                                                    $password,
                                                    $level,
                                                    $image
                                                );
                                                echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                Data Tersimpan
                                </div>";
                                            }
                                            ?>
                                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukan Username" required="">
                                                    <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="namauser">Nama Anda</label>
                                                    <input type="text" id="namauser" name="namauser" class="form-control" placeholder="Masukan Nama Anda" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password2">Password Confirm</label>
                                                    <input type="password" id="password2" name="password2" class="form-control" placeholder="Masukan Password Confirm" required="">
                                                </div>
                                                <div class="form-group">
                                                    <select name="level" id="level" class="form-control" required="">
                                                        <option value="">-PILIH</option>
                                                        <option value="1">Administrator</option>
                                                        <option value="2">Gudang</option>
                                                        <option value="3">Pimpinan</option>
                                                    </select>
                                                </div>

                                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                                <a href="?page=user" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 