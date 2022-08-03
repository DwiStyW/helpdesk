<?php
include "koneksi.php";
include "cek-login.php";
?>
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
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

    <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="../css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../css/data-table/bootstrap-editable.css">

    <script type="text/javascript" src="../js/chartjs/Chart.js"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include('mobile.php') ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include('menu.php') ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include('notif.php') ?>
            <!-- HEADER DESKTOP-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#add_data_Modal">Tambah User</button>
                                </div>
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Daftar User Helpdesk</h3>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Divisi</th>
                                                <th>Role</th>
                                                <th>Performance</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_id!=1");
                                            $no = 1;
                                            while ($data  = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr class="tr-shadow">
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php $user = $data['username'];
                                                        echo $user; ?></td>
                                                    <td><?php echo $data['divisi']; ?></td>
                                                    <td><?php echo $data['role']; ?></td>
                                                    <?php
                                                    $query0 = mysqli_query($conn, "SELECT * FROM perform WHERE user_id='$user'");
                                                    $data0  = mysqli_num_rows($query0);
                                                    ?>
                                                    <td>
                                                        <div class="progress mb-3">
                                                            <?php
                                                            $query01 = mysqli_query($conn, "SELECT * FROM perform");
                                                            $data01  = mysqli_num_rows($query01);
                                                            $prosen  = $data0 / $data01 * 100;
                                                            ?>
                                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $prosen; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $data0; ?></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="hapus.php?no=<?php echo $data['user_id']; ?>" onclick="javascript: return confirm('Anda yakin hapus data ? Data yang anda hapus tidak dapat kembali lagi SELAMANYA !')"> Hapus</a></td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAIN CONTENT-->
            <?php include('copyright.php'); ?>

        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <section>
        <!-- tambah user -->
        <div id="add_data_Modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Tambah User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="insert.php?mode=5">
                            <label>Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                            <br />
                            <label>Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                            <br />
                            <label>Password</label>
                            <input type="Password" id="password" name="password" class="form-control">
                            <br />
                            <label>Divisi</label>
                            <select name="divisi" id="divisi" class="form-control" required="required">
                                <option value="ITE">IT</option>
                                <option value="TEK">Teknik</option>
                                <option value="BNG">Bangunan</option>
                                <option value="PRO">Produksi</option>
                            </select>
                            <br />
                            <label>Role</label>
                            <select name="role" id="role" class="form-control" required="required">
                                <option value="admin">Admin</option>
                                <option value="employee">Employee</option>
                                <option value="user">User</option>
                            </select>
                            <br />
                            <input type="submit" name="insert" id="insert" value="Tambah User" class="btn btn-success" />
                            <br />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END PAGE CONTAINER-->




    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>
    <script>
        function deleteConfirm(event) {
            Swal.fire({
                title: 'Konfirmasi!',
                text: 'Yakin ingin Menghapus Data ini?',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Yakin',
                confirmButtonColor: 'red'
            }).then(dialog => {
                if (dialog.isConfirmed) {
                    window.location.assign(event.dataset.deleteUrl);
                }
            });
        }
    </script>
    <!-- Main JS-->
    <script src="../js/main.js"></script>


    <!-- data-table CSS
		============================================ -->
    <link rel="stylesheet" href="../css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../css/data-table/bootstrap-editable.css">

</body>

</html>
<!-- end document-->