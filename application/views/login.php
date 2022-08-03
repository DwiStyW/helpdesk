<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon.ico">
    <!-- Fontfaces CSS-->
    <link href="<?= base_url() ?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url() ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url() ?>assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?= base_url() ?>assets/images/logo.png" alt="INDOSAR">
                            </a>
                        </div>
                        <div class="login-form">
                            <?php
                            error_reporting(0);
                            $message = $_GET['error']; ?>
                            <div class="but_list">
                                <?php if ($message == 1) { ?>
                                    <div class="alert alert-danger" role="alert">Username/Password salah, silahkan coba lagi.</div>
                                <?php } else if ($message == 2) { ?>
                                    <div class="alert alert-danger" role="alert">Anda belum login, silahkan login.</div>
                                <?php } else if ($message == 3) { ?>
                                    <div class="alert alert-success" role="alert">Anda berhasil logout.</div>
                                <?php } else if ($message == 4) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <center>Username/Password berhasil diganti.<br /> Silahkan login ulang.<center>
                                    </div>
                                <?php } ?>
                                <form action="admin/auth.php" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                    </div>

                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                    <br />
                                    <a href="<?= base_url('home') ?>"><i class="fas fa-sm fa-arrow-left"></i> Kembali</a>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="<?= base_url() ?>assets/vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="<?= base_url() ?>assets/vendor/slick/slick.min.js">
        </script>
        <script src="<?= base_url() ?>assets/vendor/wow/wow.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/animsition/animsition.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="<?= base_url() ?>assets/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="<?= base_url() ?>assets/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="<?= base_url() ?>assets/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="<?= base_url() ?>assets/js/main.js"></script>

</body>

</html>
<!-- end document-->