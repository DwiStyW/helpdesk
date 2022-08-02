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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <?php
                            include "koneksi.php";
                            $tikk   = $_SESSION['notikk'] = $_GET['notikk'];
                            $queryy = mysqli_query($conn, "SELECT * FROM ticket WHERE notiket='$tikk'");
                            $dat    = mysqli_fetch_array($queryy);

                            $rowcount = mysqli_num_rows($queryy);
                            if ($rowcount == 0) {
                                echo "No record found";
                            } else { 
                        ?>  
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">Riwayat Ticket</h3>
                            <h4>No Ticket : <?php echo $tikk; ?></h4>
                            <h4 style="text-align:right;">Status : 
                                <?php if ($dat['status'] == 'new'){ ?>
                                  <span style="color:red"> New</span>
                                <?php } else if ($dat['status'] == 'proses'){ ?>
                                  <span style="color:orange"> Proses</span>
                                <?php } else { ?>
                                  <span style="color:green"> Closed</span>
                                <?php  } ; ?>
                            </h4>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>Tgl</th>
                                            <th>Keterangan</th>
                                            <th>Foto</th>
                                            <th>Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = mysqli_query($conn, "SELECT * FROM riwayat WHERE notiket='$tikk' ORDER BY id DESC");
                                            
                                            while ($data  = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr class="tr-shadow">
                                            <td><?php echo $data['tgl']; ?></td>
                                            <td><?php echo $data['ket']; ?></td>
                                            <td><a href="../images/foto/<?php echo $data['poto']; ?>" target="_blank"><?php echo $data['poto']; ?></a></td>
                                            <td><?php echo $data['oleh']; ?></td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <?php } ;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                            <a href="inputtiket.php"><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</button></a>
                            <a href="logout.php"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-times-circle"></i> Logout</button></a>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- COPYRIGHT-->
            <?php include('../footer.php'); ?>
            <!-- END COPYRIGHT-->
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