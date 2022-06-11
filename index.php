<?php
session_start();
require_once "classcrud/class.crud.php"; //panggil classcrud

if (!isset($_SESSION['adm'])) {
    echo "<script>alert('Anda Harus Login..!');</script>";
    echo "<script>location='login/login.php';</script>";
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

    <title>Apk Penjualan Megatama Gemilang Sakti</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- mycss -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- bootstrap 4.0.0 alpha 6 css -->
    <link href="assets/bootstrap4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap4/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/bootstrap4/js/popper.min.js"></script>
    <!-- bootbox -->
    <script src="assets/js/bootbox.min.js"></script>





</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?page=dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->

                    <?php $id = $_SESSION['adm']['id_users']; ?>
                    <?php
                    $query = $koneksi->query("SELECT * FROM tb_users WHERE id_users = '$id'");
                    $row = $query->fetch_assoc();
                    ?>

                    <img src="assets/mycss/img/<?php echo $row['image']; ?>" class="img-profile rounded-circle" style="width: 50px;" alt="Cinque Terre">
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['adm']['level'] == 1 ? "Admin" : ($_SESSION['adm']['level'] == 2 ? "Gudang" : "HRD"); ?><sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
        <a class="nav-link" href="?page=dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li> -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <div id="collapseOne" <?= @$_GET['page'] != 'dashboard' ? 'class="collapse"' : 'class="collapse show"' ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Dashboard</h6>
                        <a <?= @$_GET['page'] == 'dashboard' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=dashboard"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if (@$_SESSION['administrator']) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Master</span>
                    </a>
                    <div id="collapseTwo" <?= @$_GET['page'] != 'barang' && @$_GET['page'] != 'supp' ? 'class="collapse"' : 'class="collapse show"' ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header active">Master</h6>
                            <a <?= @$_GET['page'] == 'barang' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=barang"><i class="fas fa-fw fa-cart-plus"></i> Barang</a>
                            <a <?= @$_GET['page'] == 'supp' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=supp"><i class="fas fa-fw fa-users"></i> Supplier</a>
                            <a <?= @$_GET['page'] == 'pelanggan' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=pelanggan"><i class="fas fa-fw fa-user"></i> Pelanggan</a>
                        </div>
                    </div>
                </li>
            <?php elseif (@$_SESSION['gudang']) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Master</span>
                    </a>
                    <div id="collapseTwo" <?= @$_GET['page'] != 'barang' && @$_GET['page'] != 'supp' ? 'class="collapse"' : 'class="collapse show"' ?> aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Master</h6>
                            <a <?= @$_GET['page'] == 'barang' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=barang"><i class="fas fa-fw fa-cart-plus"></i> Barang</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if (@$_SESSION['administrator']) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="collapseThree" <?= @$_GET['page'] != 'datastok' && @$_GET['page'] != 'tambahpembelian' && @$_GET['page'] != 'detailpembelian' && @$_GET['page'] != 'penjualan' && @$_GET['page'] != 'detailpenjualan' ? 'class="collapse"' : 'class="collapse show"' ?> aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Transaksi Persediaan</h6>
                            <a <?= @$_GET['page'] == 'datastok' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=datastok"><i class="fas fa-fw fa-link"></i> Stok Barang</a>
                            <h6 class="collapse-header">Transaksi Pembelian</h6>
                            <a <?= @$_GET['page'] == 'tambahpembelian' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=tambahpembelian"><i class="fas fa-fw fa-shopping-basket"></i> Pembelian</a>
                            <a <?= @$_GET['page'] == 'detailpembelian' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=detailpembelian"><i class="fas fa-fw fa-list-alt"></i> Detail Pembelian</a>
                            <h6 class="collapse-header">Transaksi Penjualan</h6>
                            <a <?= @$_GET['page'] == 'penjualan' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=penjualan"><i class="fas fa-fw fa-dollar-sign"></i> Penjualan</a>
                            <a <?= @$_GET['page'] == 'detailpenjualan' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=detailpenjualan"><i class="fas fa-fw fa-list"></i> Detail Penjualan</a>
                        </div>
                    </div>
                </li>
            <?php elseif (@$_SESSION['gudang']) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="collapseThree" <?= @$_GET['page'] != 'datastok' && @$_GET['page'] != 'tambahpembelian' && @$_GET['page'] != 'detailpembelian' && @$_GET['page'] != 'penjualan' ? 'class="collapse"' : 'class="collapse show"' ?> aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Transaksi Persediaan</h6>
                            <!-- <a class="collapse-item" href="?page=pembelian">Pembelian</a> -->
                            <a <?= @$_GET['page'] == 'datastok' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=datastok"><i class="fas fa-fw fa-link"></i> Stok Barang</a>
                            <h6 class="collapse-header">Lihat Detail Pembelian</h6>
                            <!-- <a class="collapse-item" href="?page=tambahpembelian">Tambah Pembelian</a> -->
                            <a <?= @$_GET['page'] == 'detailpembelian' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=detailpembelian"><i class="fas fa-fw fa-list-alt"></i> Detail Pembelian</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <?php if (@$_SESSION['administrator']) : ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <li class="nav-item">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <i class="fas fa-fw fa-shopping-cart"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <span>Penjualan</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </a>    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="bg-white py-2 collapse-inner rounded">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <h6 class="collapse-header">Penjualan</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <a class="collapse-item" href="?page=penjualan">Penjualan</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <a class="collapse-item" href="?page=detailpenjualan">Detail Penjualan</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </li>
            <?php endif; ?> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if (@$_SESSION['administrator'] || @$_SESSION['pimpinan']) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                        <i class="fas fa-fw fa-file-archive"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseUtilities2" <?= @$_GET['page'] != 'laporanpembelian' && @$_GET['page'] != 'laporanpenjualan' && @$_GET['page'] != 'laporandatastok' ? 'class="collapse"' : 'class="collapse show"' ?> aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Laporan</h6>
                            <a <?= @$_GET['page'] == 'laporanpembelian' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=laporanpembelian"><i class="fas fa-fw fa-paperclip"></i> Laporan Pembelian</a>
                            <a <?= @$_GET['page'] == 'laporandatastok' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=laporandatastok"><i class="fas fa-fw fa-paperclip"></i> Laporan Stok Barang</a>
                            <a <?= @$_GET['page'] == 'laporanpenjualan' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=laporanpenjualan"><i class="fas fa-fw fa-paperclip"></i> Laporan Penjualan</a>

                        </div>
                    </div>
                </li>
            <?php elseif (@$_SESSION['gudang']) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
                        <i class="fas fa-fw fa-file-archive"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseUtilities2" <?= @$_GET['page'] != 'laporanpembelian' && @$_GET['page'] != 'laporanpenjualan' && @$_GET['page'] != 'laporandatastok' ? 'class="collapse"' : 'class="collapse show"' ?> aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Laporan</h6>
                            <a <?= @$_GET['page'] == 'laporanpembelian' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=laporanpembelian"><i class="fas fa-fw fa-paperclip"></i> Laporan Pembelian</a>
                            <a <?= @$_GET['page'] == 'laporandatastok' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=laporandatastok"><i class="fas fa-fw fa-paperclip"></i> Laporan Stok Barang</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>




            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->


            <?php if (@$_SESSION['administrator']) : ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Setting User
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User</span>
                    </a>
                    <div id="collapsePages" <?= @$_GET['page'] != 'user' ? 'class="collapse"' : 'class="collapse show"' ?> aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-light py-2 collapse-inner rounded">
                            <h6 class="collapse-header">User</h6>
                            <a <?= @$_GET['page'] == 'user' ? 'class="collapse-item active"' : 'class="collapse-item"' ?> href="?page=user"><i class="fas fa-fw fa-user"></i> User</a>
                            <!-- <div class="collapse-divider"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <h6 class="collapse-header">Other Pages:</h6>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class="collapse-item" href="404.html">404 Page</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class="collapse-item active" href="blank.html">Blank Page</a> -->
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="content-bg">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>




                    <!--==== Topbar Search ====-->


                    <!-- <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" name="keyword" autofocus autocomplete="off" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!--=== Topbar Navbar ===-->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <?php $query = $koneksi->query("SELECT * FROM data_stok INNER JOIN tb_barang ON data_stok.id_brg = tb_barang.id_brg WHERE stok <= 10"); ?>
                        <?php $jdata = $query->num_rows; ?>


                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <?php if ($jdata) { ?>
                                    <span class="badge badge-danger badge-counter"><?php echo $jdata; ?></span></span>
                                <?php } ?>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in bg-light" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <?php while ($data = $query->fetch_assoc()) : ?>
                                    <a class="dropdown-item d-flex align-items-center" href="?page=datastok">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-danger">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500"><?= date('d-M-Y'); ?></div>
                                            <span class="font-weight-bold text-danger"><?= ucwords($data['nama_barang']) ?> Tersisa <?= $data['stok']; ?></span>
                                        </div>
                                    </a>
                                <?php endwhile; ?>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i> -->
                        <!-- Counter - Messages -->
                        <!-- <span class="badge badge-danger badge-counter">7</span>
              </a> -->
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <?php $id = $_SESSION['adm']['id_users']; ?>
                        <?php
                        $query = $koneksi->query("SELECT * FROM tb_users WHERE id_users = '$id'");
                        $row = $query->fetch_assoc();
                        ?>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?= ucwords($row['username']); ?>
                                </span>
                                <img class="img-profile rounded-circle" src="assets/mycss/img/<?= $row['image']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="?page=userprofile&id=<?php echo $row['id_users']; ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') { ?>
                        <?php require_once 'views/dashboard.php'; ?>
                    <?php } ?>
                    <!-- User profile -->
                    <?php if (@$_GET['page'] == 'userprofile') { ?>
                        <?php require_once 'views/user_profile.php'; ?>
                    <?php } ?>
                    <!-- user -->
                    <?php if (@$_GET['page'] == 'user') { ?>
                        <?php if (@$_SESSION['administrator']) { ?>
                            <?php require_once 'views/user.php'; ?>
                        <?php } else { ?>
                            <?php echo "<script>alert('Maaf anda tidak punya akses kesini');</script>"; ?>
                            <?php require_once 'views/dashboard.php'; ?>
                        <?php } ?>
                    <?php } ?>
                    <!-- Tambah user  -->
                    <?php if (@$_GET['page'] == 'tambahuser') { ?>
                        <?php require_once 'views/aksi/tambahuser.php'; ?>
                    <?php } ?>
                    <?php if (@$_GET['page'] == 'ubahuser') { ?>
                        <?php require_once 'views/aksi/ubahuser.php'; ?>
                    <?php } ?>

                    <!-- barang -->
                    <?php if (@$_GET['page'] == 'barang') { ?>
                        <?php require_once 'views/barang.php'; ?>
                    <?php } ?>

                    <!-- tambah barang -->
                    <?php if (@$_GET['page'] == 'tambahbrg') { ?>
                        <?php require_once 'views/aksi/tambahbrg.php'; ?>
                    <?php } ?>
                    <!-- ubah barang -->
                    <?php if (@$_GET['page'] == 'ubahbrg') { ?>
                        <?php require_once 'views/aksi/ubahbrg.php'; ?>
                    <?php } ?>

                    <!-- Supplier -->
                    <?php if (@$_GET['page'] == 'supp') { ?>
                        <?php require_once 'views/supp.php'; ?>
                    <?php } ?>
                    <!-- Tambah SUpplier -->
                    <?php if (@$_GET['page'] == 'tambahsupp') { ?>
                        <?php require_once 'views/aksi/tambahsupp.php'; ?>
                    <?php } ?>
                    <!-- Ubah supplier -->
                    <?php if (@$_GET['page'] == 'ubahsupp') { ?>
                        <?php require_once 'views/aksi/ubahsupp.php'; ?>
                    <?php } ?>

                    <!-- Pelanggan -->
                    <?php if (@$_GET['page'] == 'pelanggan') { ?>
                        <?php //if (!@$_SESSION['administrator'] && !@$_SESSION['gudang']) { 
                            ?>
                        <?php if (!@$_SESSION['administrator']) { ?>
                            <?php echo "<script>alert('Maaf anda tidak punya akses kesini');</script>"; ?>
                            <?php echo "<script>window.location.href='?page=dashboard';</script>"; ?>
                        <?php } else { ?>
                            <?php require_once 'views/pelanggan.php'; ?>
                        <?php } ?>
                    <?php } ?>
                    <!-- Tambah pelanggan -->
                    <?php if (@$_GET['page'] == 'tambahpelanggan') { ?>
                        <?php require_once 'views/aksi/tambahpelanggan.php'; ?>
                    <?php } ?>
                    <!-- Ubah pelanggan -->
                    <?php if (@$_GET['page'] == 'ubahpelanggan') { ?>
                        <?php require_once 'views/aksi/ubahpelanggan.php'; ?>
                    <?php } ?>

                    <!-- Pembelian -->
                    <?php if (@$_GET['page'] == 'tambahpembelian') { ?>
                        <?php if (@$_SESSION['administrator']) { ?>
                            <?php require_once 'views/tambahpembelian.php'; ?>
                        <?php } else { ?>
                            <?php require_once 'views/dashboard.php'; ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if (@$_GET['page'] == 'detailpembelian') { ?>
                        <?php require_once 'views/detailpembelian.php'; ?>
                    <?php } ?>

                    <!-- Data Stok -->
                    <?php if (@$_GET['page'] == 'datastok') { ?>
                        <?php if (!@$_SESSION['gudang'] && !@$_SESSION['administrator']) { ?>
                            <?php echo "<script>alert('Maaf anda tidak punya akses kesini');</script>"; ?>
                            <?php echo "<script>window.location.href='?page=dashboard';</script>"; ?>
                        <?php } else { ?>
                            <?php require_once 'views/datastok.php'; ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if (@$_GET['page'] == 'tambahbrgstok') { ?>
                        <?php require_once 'views/aksi/tambahbrgstok.php'; ?>
                    <?php } ?>
                    <?php if (@$_GET['page'] == 'ubahbrgstok') { ?>
                        <?php require_once 'views/aksi/ubahbrgstok.php'; ?>
                    <?php } ?>

                    <!-- Penjualan -->
                    <?php if (@$_GET['page'] == 'penjualan') { ?>
                        <?php if (@$_SESSION['administrator']) { ?>
                            <?php require_once 'views/penjualan.php'; ?>
                        <?php } else { ?>
                            <?php require_once 'views/dashboard.php'; ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if (@$_GET['page'] == 'detailpenjualan') { ?>
                        <?php if (@$_SESSION['administrator']) { ?>
                            <?php require_once 'views/detailpenjualan.php'; ?>
                        <?php } else { ?>
                            <?php require_once 'views/dashboard.php'; ?>
                        <?php } ?>
                    <?php } ?>

                    <!-- Laporan -->
                    <?php if (@$_GET['page'] == 'laporanpembelian') { ?>
                        <?php if (@$_SESSION['administrator'] || @$_SESSION['pimpinan'] || @$_SESSION['gudang']) { ?>
                            <?php require_once 'laporan/laporanpembelian.php'; ?>
                        <?php } else { ?>
                            <?php require_once 'views/dashboard.php'; ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if (@$_GET['page'] == 'laporanpenjualan') { ?>
                        <?php if (@$_SESSION['administrator'] || @$_SESSION['pimpinan']) { ?>
                            <?php require_once 'laporan/laporanpenjualan.php'; ?>
                        <?php } else { ?>
                            <?php require_once 'views/dashboard.php'; ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if (@$_GET['page'] == 'laporandatastok') { ?>
                        <?php if (@$_SESSION['administrator'] || @$_SESSION['pimpinan'] || @$_SESSION['gudang']) { ?>
                            <?php require_once 'laporan/laporandatastok.php'; ?>
                        <?php } else { ?>
                            <?php require_once 'views/dashboard.php'; ?>
                        <?php } ?>
                    <?php } ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; APK Penjualan 2019 by <a href="https://www.instagram.com/nnoer__/" target="_blank">@nnoer__</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login/proseslogin.php?logout=1">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>

    <!-- my Ajax JQuery -->
    <script type="text/javascript" src="myjquery/fetch_brg.js"></script>
    <script type="text/javascript" src="myjquery/fetch_transaksi.js"></script>
    <script src="myjquery/fetch_data_stok.js"></script>


    <script>
        $(document).on("click", "#alertHapus", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            bootbox.confirm("Lanjutkan Menghapus!", function(confirmed) {
                if (confirmed) {
                    window.location.href = link;
                };
            });
        });
    </script>



</body>

</html>