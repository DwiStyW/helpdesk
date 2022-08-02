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
                        <div class="col-md-12">
                            <h1 class="title-4">Selamat datang di Work Order
                                <span>PT Indo Abadi Sarimakmur</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                        <div class="col-md-9">
                            <p> Work Order ini di buat untuk membantu proses pencatatan progres pengerjaan terutama di bagian Teknik </p>
                        </div>
                        <div class="col-md-3" style="padding-top: 10px;">
                            <button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="window.location.href='admin/inputtiket.php'">Buat WO</button>
                            <button type="button" class="btn btn-outline-warning btn-lg btn-block"  data-toggle="modal" data-target="#add_data_Modal" >Cek Status WO</button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
            

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