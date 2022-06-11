<?php 
session_start();

if (isset($_SESSION['adm'])) {
  echo "<script>alert('Anda Harus Logout..!');</script>";
  echo "<script>location='../?page=dashboard';</script>";
  exit();
  //header('location:login/login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GO-BLUE Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/mycss/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary my-bg">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
            <div class="card-body p-8">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="prosesregister.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-range" id="exampleInputUsername" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="namauser" class="form-control form-control-range" id="exampleInputNamauser" placeholder="Nama Anda" required>
                                </div>
                                <div class="form-group">
                                    <select name="level" id="level" class="form-control form-control-range" required>
                                        <option value="">-PILIH LEVEL-</option>
                                        <option value="1">Administrator</option>
                                        <option value="2">Gudang</option>
                                        <option value="3">Pimpinan</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-range" id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password2" class="form-control form-control-range" id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>
                                <!-- <hr> -->
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html> 