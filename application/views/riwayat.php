<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include('menu.php'); ?>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <?php
                            include "admin/koneksi.php";
                            $tikk   = $_SESSION['notikk'] = $_POST['notikk'];
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
                                            <td><a href="images/foto/<?php echo $data['poto']; ?>" target="_blank"><?php echo $data['poto']; ?></a></td>
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
                </div>
            </section>

            <!-- pop up cek WO -->
                <div id="add_data_Modal" class="modal fade">
                 <div class="modal-dialog">
                  <div class="modal-content">
                       <div class="modal-header">
                            <h4>Masukkan No WO Anda</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                       </div>
                       <div class="modal-body">
                            <form method="post" action="riwayat.php">
                             <label>Nomor WO</label>
                                <input type="text" id="notikk" name="notikk" class="form-control" required="required">
                             <br/>
                             <input type="submit" name="insert" id="insert" value="Cari Ticket" class="btn btn-success" />
                             <br/>
                            </form>
                      </div>
                   </div>
                  </div>

                 </div>

        </div>

    </div>

    <?php include('footer.php'); ?>

</body>

</html>
<!-- end document-->