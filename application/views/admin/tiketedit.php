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
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Riwayat WO</h3>
                                <?php
                                    $tikk   = $_GET['tikk'];
                                    $queryy = mysqli_query($conn, "SELECT * FROM ticket WHERE notiket='$tikk'");
                                    $dat    = mysqli_fetch_array($queryy);
                                ?>
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
                                            <?php } ;
                                                $que = mysqli_query($conn, "SELECT * FROM riwayat WHERE notiket='$tikk'");
                                                $da  = mysqli_fetch_array($que);
                                                $olehh = explode(",", $da['oleh']);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <!-- BREADCRUMB-->
                
                <section class="au-breadcrumb2">
                    <?php
                    foreach ($olehh as $data) {
                    if ($dat['status']!="close" &&  $user_login['role'] == 'admin') {?>
                    <!-- Delegasi tugas --> 
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <form action="insert.php?mode=2" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-header">
                                            <strong>Delegasi Tugas / Tambah Progres</strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Tanggal</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="notikk" name="notikk" value="<?php echo $tikk; ?>" class="form-control" hidden="hidden">
                                                    <input type="text" id="adminn" name="adminn" value="<?php echo $_SESSION['username']; ?>" class="form-control" hidden="hidden">
                                                    <input type="datetime" id="tgl" name="tgl" value="<?php echo date("Y-m-d h:m:s"); ?>" class="form-control" readonly="">
                                                    <!-- <small class="form-text text-muted">This is a help text</small> -->
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Keterangan Lengkap</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="kete" id="kete" rows="9" placeholder="Keterangan..." class="form-control" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">PIC</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="untuk[]" id="multiple-select" multiple="" class="form-control" required="required">
                                                        <?php
                                                            $three = substr($tikk,0,3);
                                                            $querin = mysqli_query($conn, "SELECT * FROM tb_user WHERE role='employee'");
                                                            while ($datar  = mysqli_fetch_array($querin)) { 
                                                        ?>
                                                            <option value="<?php echo $datar['username'];?>"><?php echo $datar['username'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Foto</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="poto" name="poto" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else if ($user_login['username'] == $data){ ?>
                    <!-- komentar -->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <form action="insert.php?mode=3" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-header">
                                            <strong>Remarks</strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Tanggal</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="notikk" name="notikk" value="<?php echo $tikk; ?>" class="form-control" hidden="hidden">
                                                    <input type="text" id="adminn" name="adminn" value="<?php echo $_SESSION['username']; ?>" class="form-control" hidden="hidden">
                                                    <input type="datetime" id="tgl" name="tgl" value="<?php echo date("Y-m-d h:m:s"); ?>" class="form-control" readonly="">
                                                    <!-- <small class="form-text text-muted">This is a help text</small> -->
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Keterangan Lengkap</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="kete" id="kete" rows="9" placeholder="Keterangan..." class="form-control" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Foto</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="poto" name="poto" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    } //tutup foreach
                    
                    //mulai Close & Reject
                    if ($dat['status'] == 'new' && $user_login['role'] == 'kabag'){ ?>
                    <!-- pop up -->
                    <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#add_data_Modal" >Reject</button>
                    <div id="add_data_Modal" class="modal fade">
                     <div class="modal-dialog">
                      <div class="modal-content">
                           <div class="modal-header">
                                <h4>Pastikan anda menghubungi user sebelum close WO</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                                <form method="post" action="insert.php?mode=4">
                                    <input type="text" id="notikk" name="notikk" value="<?php echo $tikk; ?>" class="form-control" hidden="hidden">
                                    <input type="text" id="adminn" name="adminn" value="<?php echo $_SESSION['username']; ?>" class="form-control" hidden="hidden">
                                    <input type="datetime" id="tgl" name="tgl" value="<?php echo date("Y-m-d h:m:s"); ?>" class="form-control" hidden="hidden">
                                 <label>Keterangan</label>
                                    <textarea name="kete" id="kete" rows="9" placeholder="Keterangan..." class="form-control" required="required"></textarea>
                                 <br/>
                                 <input type="submit" name="insert" id="insert" value="Close Ticket" class="btn btn-success" />
                                 <br/>
                                </form>
                          </div>
                       </div>
                      </div>
                     </div>
                    <?php } else if ($dat['status'] == 'aprv' && $user_login['role'] == 'admin'){ ?>
                    <!-- pop up close -->
                    <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#add_data_Modal" >Reject</button>
                    <div id="add_data_Modal" class="modal fade">
                     <div class="modal-dialog">
                      <div class="modal-content">
                           <div class="modal-header">
                                <h4>Pastikan anda menghubungi user sebelum close tiket</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                                <form method="post" action="insert.php?mode=4">
                                    <input type="text" id="notikk" name="notikk" value="<?php echo $tikk; ?>" class="form-control" hidden="hidden">
                                    <input type="text" id="adminn" name="adminn" value="<?php echo $_SESSION['username']; ?>" class="form-control" hidden="hidden">
                                    <input type="datetime" id="tgl" name="tgl" value="<?php echo date("Y-m-d h:m:s"); ?>" class="form-control" hidden="hidden">
                                 <label>Keterangan</label>
                                    <textarea name="kete" id="kete" rows="9" placeholder="Keterangan..." class="form-control" required="required"></textarea>
                                 <br/>
                                 <input type="submit" name="insert" id="insert" value="Close Ticket" class="btn btn-success" />
                                 <br/>
                                </form>
                          </div>
                       </div>
                      </div>
                     </div>
                    <?php } else if ($dat['status'] != 'closed' && $dat['status'] != 'new' && $user_login['role'] == 'admin'){ ?>
                    <!-- pop up close -->
                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#add_data_Modal" >Close Ticket</button>
                    <div id="add_data_Modal" class="modal fade">
                     <div class="modal-dialog">
                      <div class="modal-content">
                           <div class="modal-header">
                                <h4>Pastikan anda menghubungi user sebelum close tiket</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                           <div class="modal-body">
                                <form method="post" action="insert.php?mode=4">
                                    <input type="text" id="notikk" name="notikk" value="<?php echo $tikk; ?>" class="form-control" hidden="hidden">
                                    <input type="text" id="adminn" name="adminn" value="<?php echo $_SESSION['username']; ?>" class="form-control" hidden="hidden">
                                    <input type="datetime" id="tgl" name="tgl" value="<?php echo date("Y-m-d h:m:s"); ?>" class="form-control" hidden="hidden">
                                 <label>Keterangan</label>
                                    <textarea name="kete" id="kete" rows="9" placeholder="Keterangan..." class="form-control" required="required"></textarea>
                                 <br/>
                                 <input type="submit" name="insert" id="insert" value="Close Ticket" class="btn btn-success" />
                                 <br/>
                                </form>
                          </div>
                       </div>
                      </div>
                     </div>
                     <!-- REJECT ticket -->
                    <?php } ?>  
                </section> <!-- END BREADCRUMB-->
                

            </div> <!-- END MAIN CONTENT-->
            
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php include('footer.php'); ?>

</body>

</html>
<!-- end document-->