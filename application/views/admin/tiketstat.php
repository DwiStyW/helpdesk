<?php
include "koneksi.php";
include "cek-login.php";

ini_set('date.timezone', 'Asia/Jakarta');
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php') ?>

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

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <div class="card-body">
                                        <a href="tiketstat.php?statt=new"><button type="button" class="btn btn-outline-danger">New</button></a>
                                        <a href="tiketstat.php?statt=proses"><button type="button" class="btn btn-outline-warning">Dlm Proses</button></a>
                                        <a href="tiketstat.php?statt=closed"><button type="button" class="btn btn-outline-success">Closed</button></a>
                                        <a href="tiket.php"><button type="button" class="btn btn-outline-default">All</button></a>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" class="table table-data3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Tiket</th>
                                                <th>Pelapor</th>
                                                <th>Divisi</th>
                                                <th>Mesin/ Prasarana</th>
                                                <th>Status</th>
                                                <th>Dikerjakan oleh</th>
                                                <th>Tgl</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stat      = $_GET['statt'];
                                            $query = mysqli_query($conn, "SELECT * FROM ticket, kategori WHERE ticket.status = '$stat' && ticket.mesin = kategori.no ORDER BY level ASC, id DESC");
                                            $no = 1;
                                            while ($data  = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><a href="riwayat.php?notikk=<?php echo $data['notiket'];?>"><?php echo $data['notiket']; ?></a></td>
                                                    <td><?php echo $data['pelapor']; ?></td>
                                                    <td><?php echo $data['divisi']; ?></td>
                                                    <td><?php echo $data['mesin']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <td><?php echo $data['holdby']; ?></td>
                                                    <td><?php echo date("d-m-Y h:m:s", strtotime($data['tgl'])); ?></td>
                                                    <td><?php if ($data['status'] != 'closed'){ ?><a href="tiketedit.php?tikk=<?php echo $data['notiket']; ?>">Proses</a><?php } ;?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                        <?php include('copyright.php'); ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

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

    <!-- Main JS-->
    <script src="../js/main.js"></script>

    <!-- data table JS
		============================================ -->
    <script src="../js/data-table/bootstrap-table.js"></script>
    <script src="../js/data-table/tableExport.js"></script>
    <script src="../js/data-table/data-table-active.js"></script>
    <script src="../js/data-table/bootstrap-table-editable.js"></script>
    <script src="../js/data-table/bootstrap-editable.js"></script>
    <script src="../js/data-table/bootstrap-table-resizable.js"></script>
    <script src="../js/data-table/colResizable-1.5.source.js"></script>
    <script src="../js/data-table/bootstrap-table-export.js"></script>

</body>

</html>
<!-- end document-->