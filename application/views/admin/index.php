<?php
include "koneksi.php";
include "cek-login.php";
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

            <!-- MAIN CONTENT
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Total Keseluruhan Ticket</h3>
                                        
                                        <div id="bar1-chart">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                        <script>                                
                                                var ctx = document.getElementById("myChart").getContext('2d');
                                                var myChart = new Chart(ctx, {
                                                    type: 'bar',
                                                    data: {                                             
                                                    labels: ["TEKNIK","BANGUNAN","IT"],
                                                        datasets: [{
                                                            label: '',
                                                            data: [<?php
                                                            $queri   = mysqli_query($conn, "SELECT notiket from ticket WHERE notiket LIKE 'TEK%'");
                                                            $count   = mysqli_num_rows($queri);
                                                            echo $count; ?>,
                                                            <?php
                                                            $queri1   = mysqli_query($conn, "SELECT notiket from ticket WHERE notiket LIKE 'BNG%'");
                                                            $count1   = mysqli_num_rows($queri1);
                                                            echo $count1; ?>, 
                                                            <?php
                                                            $queri2   = mysqli_query($conn, "SELECT notiket from ticket WHERE notiket LIKE 'ITE%'");
                                                            $count2   = mysqli_num_rows($queri2);
                                                            echo $count2; ?>],
                                                            backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)'
                                                            ],
                                                            borderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)'
                                                            ],
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero:true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- DATA TABLE
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Tiket</th>
                                                <th>Tgl</th>
                                                <th>Pelapor</th>
                                                <th>Divisi</th>
                                                <th>No HP</th>
                                                <th>Email</th>
                                                <th>Keluhan</th>
                                                <th>Keterangan</th>
                                                <th>Untuk</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>Dikerjakan oleh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM ticket ORDER BY id DESC");
                                            $no = 1;
                                            while ($data  = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data['notiket']; ?></td>
                                                    <td><?php echo date("d-m-Y h:m:s", strtotime($data['tgl'])); ?></td>
                                                    <td><?php echo $data['pelapor']; ?></td>
                                                    <td><?php echo $data['divisi']; ?></td>
                                                    <td><?php echo $data['nohp']; ?></td>
                                                    <td><?php echo $data['email']; ?></td>
                                                    <td><?php echo $data['keluhan']; ?></td>
                                                    <td><?php echo $data['ket']; ?></td>
                                                    <td><?php echo $data['untuk']; ?></td>
                                                    <td><?php echo $data['poto']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <td><?php echo $data['holdby']; ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE
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

   <?php include('footer.php'); ?>

</body>

</html>
<!-- end document-->