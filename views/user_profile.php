<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>myContent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script> -->
</head>

<body>


    <section class="content-header">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                User Profile
            </h1>

    </section>

    <section class="content-body">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Profile User</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">

                    <div class="card mb-3" style="max-width: 750px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <?php
                                $row = $users->ambil_user($koneksi, $_GET['id']);
                                ?>
                                <img src="assets/mycss/img/<?= $row['image'];  ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= ucwords($row['username']);  ?></h5>
                                    <p class="card-text"><?= $row['level'] == 1 ? "Admin" : ($row['level'] == 2 ? "Gudang" : "Pimpinan"); ?></p>
                                    <p class="card-text"><small class="text-muted"><?php echo date('d-M-Y'); ?></small></p>
                                    <a href="?page=ubahuser&id=<?php echo $row['id_users']
                                                                ?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i> Edit User Profile</a>
                                    <?php if (@$_SESSION['administrator']) : ?>
                                        <a href="?page=user" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Back To User</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>





</body>

</html>