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
        <!-- HEADER DESKTOP-->
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                              <form action="insert.php?mode=1" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="card-header">
                                    <strong>Input Tikcet / Permintaan Perbaikan & Pembuatan</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Tanggal</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="datetime" id="tgl" name="tgl" value="<?php echo date("Y-m-d h:m:s");?>" class="form-control" readonly="">
                                            <!-- <small class="form-text text-muted">This is a help text</small> -->
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Section/Nama Pelapor</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="nama" name="nama" placeholder="Nama Anda" class="form-control" value="<?php echo $_SESSION['username']?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Divisi/Bagian</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="divisi" name="divisi" placeholder="Divisi/Bagian" class="form-control" value="<?php echo $_SESSION['divisi']?>" readonly="">
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email-input" class=" form-control-label">Mesin/Sarana</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select id="mesin" name="mesin" class="form-control" required="required">
                                                <?php
                                                $queryy = mysqli_query($conn, "SELECT * FROM kategori");
                                                while ($data  = mysqli_fetch_array($queryy)) { 
                                                    ?>
                                                   <option value="<?php echo $data['no'];?>"><?php echo $data['mesin'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Keterangan Lengkap</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="kete" id="kete" rows="9" placeholder="Keterangan..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Foto Kerusakan</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="poto" name="poto" class="form-control-file">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                    <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset</button>
                                    <a href="logout.php"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-times-circle"></i> Logout</button></a>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <strong> Nomor WO yang masih aktif </strong>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Tiket</th>
                                            <th>Tgl</th>
                                            <th>Pelapor</th>
                                            <th>Mesin/Prasarana</th>
                                            <th>Keterangan</th>
                                            
                                            <th>Status</th>
                                            <th>Dikerjakan oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $diiv  = $_SESSION['divisi'];
                                        $query = mysqli_query($conn, "SELECT * FROM ticket WHERE divisi='$diiv' ORDER BY id DESC");
                                        $no = 1;
                                        while ($data  = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><a href="riwayatt.php?notikk=<?php echo $data['notiket']; ?>"><?php echo $data['notiket']; ?></a></td>
                                                <td><?php echo date("d-m-Y h:m:s", strtotime($data['tgl'])); ?></td>
                                                <td><?php echo $data['pelapor']; ?></td>
                                                <td><?php echo $data['mesin']; ?></td>
                                                <td><?php echo $data['ket']; ?></td>
                                                
                                                <td><?php echo $data['status']; ?></td>
                                                <td><?php echo $data['holdby']; ?></td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
            <!-- pop up close -->
                <div id="add_data_Modal" class="modal fade">
                 <div class="modal-dialog">
                  <div class="modal-content">
                       <div class="modal-header">
                            <h4>Masukkan Tiket Pelaporan Anda</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                       </div>
                       <div class="modal-body">
                            <form method="post" action="riwayat.php">
                             <label>Nomor Ticket</label>
                                <input type="text" id="notikk" name="notikk" class="form-control" required="required">
                             <br/>
                             <input type="submit" name="insert" id="insert" value="Cari Ticket" class="btn btn-success" />
                             <br/>
                            </form>
                      </div>
                   </div>
                  </div>
                 </div>
            <!-- COPYRIGHT-->
            <?php include('COPYRIGHT.php'); ?>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js"></script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->