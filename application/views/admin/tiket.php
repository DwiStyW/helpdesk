<?php
ini_set('date.timezone', 'Asia/Jakarta');
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<body class="animsition">
    <div class="page-wrapper">
        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <div class="card-body">
                                        <!-- 
                                        <button type="button" class="btn btn-outline-danger" style="margin: 10px">Urgent <span class="badge badge-light">7</span></button> -->
                                        <a href="tiketstat.php?statt=new"><button type="button" class="btn btn-outline-danger">New</button></a>
                                        <a href="tiketstat.php?statt=proses"><button type="button" class="btn btn-outline-warning">Dlm Proses</button></a>
                                        <a href="tiketstat.php?statt=closed"><button type="button" class="btn btn-outline-success">Closed</button></a>
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
                                            $no = 1;
                                            foreach ($tiket as $t) : ?>
                                                <tr>
                                                    <td><?= $t->id ?></td>
                                                    <td><?= $t->notiket ?></td>
                                                    <td><?= $t->pelapor ?></td>
                                                    <td><?= $t->divisi ?></td>
                                                    <td><?= $t->mesin ?></td>
                                                    <td><?= $t->status ?></td>
                                                    <td><?= $t->holdby ?></td>
                                                    <td><?= $t->tgl ?></td>
                                                    <td><a href="#">Proses</a></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                        <?php $this->load->view('admin/notif');
                        $this->load->view('admin/copyright');
                        ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

</body>

</html>
<!-- end document-->