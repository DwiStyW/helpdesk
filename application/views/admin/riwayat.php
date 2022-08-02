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
                            <?php
                                error_reporting(0);
                                include "koneksi.php";
                                $tikk   = $_POST['notikk'];
                                if ($tikk==null) {
                                    $tikk   = $_GET['notikk'];
                                }

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
                                                $query = mysqli_query($conn, "SELECT * FROM riwayat WHERE notiket='$tikk' ORDER BY id ASC");
                                                
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
                            </div>
                            <?php } ?>
                        </div>

                        <?php include('copyright.php'); ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <?php include('footer.php'); ?>
</body>

</html>
<!-- end document-->