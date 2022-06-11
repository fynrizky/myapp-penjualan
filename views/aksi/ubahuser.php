<!-- <div class="float-right">
	<a href="?page=barang" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
</div> -->
<div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Update User</h6>
    </a>

    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> Update User</h3>
                        </div>
                        <hr />
                        <div class="box-body">
                            <?php 
                            if (isset($_POST['save'])) {


                                $id = $_GET['id'];
                                $username = $_POST['username'];
                                // $namauser = $_POST['namauser'];
                                $password = $_POST['password'];
                                $password2 = $_POST['password2'];

                                //cek password
                                if ($password2 != $password) {
                                    echo "<script>alert('Password Tidak Sama');</script>";
                                    echo "<script>window.location.href='?page=ubahuser&id=" . $id . "';</script>";
                                    return false;
                                }

                                $query = $koneksi->query("SELECT * FROM tb_users WHERE username = '$username' AND id_users != '$id'");
                                //cek username
                                if ($query->num_rows > 0) {
                                    echo "<script>alert('Username Sudah Terpakai');</script>";
                                    echo "<script>window.location.href='?page=ubahuser&id=" . $id . "';</script>";
                                    return false; //berhentikan
                                } else {



                                    //buat query baru
                                    $query = $koneksi->query("SELECT * FROM tb_users WHERE id_users = '$id'");

                                    //jika password tidak diisi/diganti
                                    if (empty($password)) {
                                        $row = $query->fetch_assoc();
                                        $password = $row['password'];
                                    } else { // dan kalau diisi/diganti
                                        $password = password_hash($password, PASSWORD_DEFAULT);
                                    }




                                    //upload file
                                    $pict = $_FILES['image']['name'];
                                    $extensi = explode(".", $_FILES['image']['name']);
                                    $image = "user-" . round(microtime(true)) . "." . end($extensi);
                                    $sumber = $_FILES['image']['tmp_name'];

                                    if ($pict == '') { // jika pic tidak dipilih
                                        $koneksi->query("UPDATE tb_users SET username = '$username', nama_user='$_POST[namauser]', password = '$password' WHERE id_users = '$id'");
                                        echo "<script>alert('Data Berhasil Di Ubah');</script>";
                                        echo "<script>window.location.href='?page=userprofile&id=" . $id . "';</script>";
                                    } else { //jika dipilih
                                        $gbr_awal = $koneksi->query("SELECT * FROM tb_users WHERE image != 'default.jpg' AND id_users = '$id'")->fetch_object()->image;
                                        unlink("assets/mycss/img/" . $gbr_awal);
                                        $upload = move_uploaded_file($sumber, "assets/mycss/img/" . $image);
                                        if ($upload) {
                                            $users->ubah_user(
                                                $koneksi,
                                                $id,
                                                $username,
                                                $_POST['namauser'],
                                                $password,
                                                $image
                                            );

                                            //   buat session bar uu/ menggantikan session awal
                                            // $query = $koneksi->query("SELECT * FROM tb_users WHERE id_users = '$id'");
                                            // $row = $query->fetch_assoc();
                                            // $data = [
                                            //     'id_users' => $row['id_users'],
                                            //     'username' => $row['username'],
                                            //     'level' => $row['level'],
                                            //     'image' => $row['image']
                                            // ];

                                            // $_SESSION['adm'] = $data;
                                            // echo "<script>window.location='?page=user';</script>";
                                            echo "<script>alert('Data Berhasil Di Ubah Dan Foto Berhasil Di Ganti');</script>";
                                            echo "<script>window.location.href='?page=userprofile&id=" . $id . "';</script>";
                                            // return TRUE;
                                        } else {
                                            echo "<script>alert('Upload Gambar Gagal')</script>";
                                            echo "<script>window.location='?page=user';</script>";
                                        }
                                    }
                                }
                            }


                            $users = $users->ambil_user($koneksi, $_GET['id']);


                            ?>
                            <form action="" id="forminput" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" value="<?php echo $users['username']; ?>" placeholder="Masukan Username">
                                    <div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
                                </div>
                                <div class="form-group">
                                    <label for="namauser">Nama</label>
                                    <input type="text" id="namauser" name="namauser" class="form-control" value="<?php echo $users['nama_user']; ?>" placeholder="Masukan Nama Anda">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password">
                                </div>
                                <div class="form-group">
                                    <label for="password2">Password Confirm</label>
                                    <input type="password" id="password2" name="password2" class="form-control" placeholder="Masukan Password Confirm">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="image">Image</label> -->
                                    <input type="file" id="image" name="image" class="form-group">
                                    <img src="assets/mycss/img/<?php echo $users['image']; ?>" width="200px">
                                </div>

                                <button id="formbtn" class="btn btn-primary btn-sm" name="save"><i class="fa fa-paper-plane"></i> Save</button>
                                <!-- tombol back -->
                                <?php if (@$_SESSION['administrator']) : ?>
                                <a href="?page=userprofile&id=<?php echo $users['id_users']; ?>" class="btn btn-info btn-group-sm btn-sm"><i class="fa fa-user"></i> Detail User</a>
                                <a href="?page=user" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Go To User</a>
                                <?php elseif (@$_SESSION['gudang']) : ?>
                                <a href="?page=userprofile&id=<?php echo $users['id_users']; ?>" class="btn btn-warning btn-group-sm btn-sm"><i class="fa fa-arrow-left"></i> Back To Profile</a>
                                <?php endif; ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 