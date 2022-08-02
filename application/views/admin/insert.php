<?php
include "koneksi.php";

ini_set('date.timezone', 'Asia/Jakarta');
date_default_timezone_set('Asia/Jakarta');
$mode = $_GET['mode'];

switch ($mode) {
    case 1:
        //insert ticket
        $tgl      = $_POST['tgl'];
        $nama     = $_POST['nama'];
        $divisi   = $_POST['divisi'];
        $mesin    = $_POST['mesin'];
        $kete     = $_POST['kete'];
        //untuk foto
        $foto     = $_FILES['poto']['name'];
        $tmp      = $_FILES['poto']['tmp_name'];
        

        $query2        = mysqli_query($conn, "SELECT * FROM ticket ORDER BY id DESC LIMIT 1" );
        $datah         = mysqli_fetch_array($query2);
        $noLm          = $datah['notiket'];
        $bln           = date('m');
        $thn           = date('y');
        $blnTkt        = sprintf("%02s", (int) substr($noLm,2,2));

        if($blnTkt==$bln){
            $noU       = (int) substr($noLm,0,2);
        } else {
            $noU       = 0;
        }

        
        $noUrut        = (int) $noU +1;
        $notik         = sprintf("%02s", $noUrut) . $bln . $thn ;
        $namafoto      = $notik . $foto;
        $path          = "../images/foto/" . $namafoto;

        $keter          = "Tiket baru dari ".$nama." Divisi : ".$divisi." Mesin/Prasarana : ".$mesin." Keterangan : ".$kete ;

        if (move_uploaded_file($tmp, $path)) {
            $query = mysqli_query($conn, "INSERT INTO ticket values('', '$notik', '$tgl', '$nama', '$divisi', '$mesin', '$kete', '$namafoto', 'new', '')");

            $query1 = mysqli_query($conn, "INSERT INTO riwayat values('', '$notik', '$keter', '$namafoto', '$tgl', '')");

            if ($query) {
                echo "<script>alert('Ticket Berhasil ditambah! No tiket anda : $notik. Mohon dicatat!'); window.location = 'inputtiket.php'</script>";
            } else {
                echo "<script>alert('Ticket Gagal ditambah!'); window.location = 'inputtiket.php'</script>";
            }
        } else {
            $query = mysqli_query($conn, "INSERT INTO ticket values('', '$notik', '$tgl', '$nama', '$divisi', '$mesin', '$kete', '', 'new', '')");

            $query1 = mysqli_query($conn, "INSERT INTO riwayat values('', '$notik', '$keter', '', '$tgl', '')");
            if ($query) {
                echo "<script>alert('Ticket Berhasil ditambah! No tiket anda : $notik. Mohon dicatat!'); window.location = 'inputtiket.php'</script>";
            } else {
                echo "<script>alert('Ticket Gagal ditambah!'); window.location = 'inputtiket.php'</script>";
            }
        }

        break;
    
    case 2:
        //insert DELEGASI
        $admin    = $_POST['adminn'];
        $notik    = $_POST['notikk'];
        $tgl      = $_POST['tgl'];
        $keter    = $_POST['kete'];
        $untu     = $_POST['untuk'];
        $untuk    = implode(",", $_POST['untuk']);
        //untuk foto
        $foto     = $_FILES['poto']['name'];
        $tmp      = $_FILES['poto']['tmp_name'];
        
        $identi        = "reply". date("m") . date("d");
        $namafoto      = $identi . $foto;
        $path          = "../images/foto/" . $namafoto;

        $kete     = $admin." Menugaskan kepada = ".$untuk." keterangan = ".$keter;

        $query3 = mysqli_query($conn, "UPDATE ticket SET holdby='$untuk', status='proses' WHERE notiket='$notik'");

        if (move_uploaded_file($tmp, $path)) {
            $query = mysqli_query($conn, "INSERT INTO riwayat values('', '$notik', '$kete', '$namafoto', '$tgl', '$untuk')");


            for ($i = 0; $i < count($untu); $i++)  {
                $query1 = mysqli_query($conn, "INSERT INTO perform values('', '$untu[$i]', '$notik', 'cobacoba', 'proses')");
            }
            

            if ($query) {
                echo "<script>alert('Riwayat Ticket Berhasil ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
            } else {
                echo "<script>alert('Riwayat Ticket Gagal ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
            }
        } else {
            $query = mysqli_query($conn, "INSERT INTO riwayat values('', '$notik', '$kete', '', '$tgl', '$untuk')");

            for ($i = 0; $i < count($untu); $i++)  {
                $query1 = mysqli_query($conn, "INSERT INTO perform values('', '$untu[$i]', '$notik', 'cobacoba', 'proses')");
            }

            if ($query) {
                echo "<script>alert('Riwayat Ticket Berhasil ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
            } else {
                echo "<script>alert('Riwayat Ticket Gagal ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
            }
        }

        break;

    case 3:
        //insert tanggapan
        $admin    = $_POST['adminn'];
        $notik    = $_POST['notikk'];
        $tgl      = $_POST['tgl'];
        $keter    = $_POST['kete'];
        
        //untuk foto
        $foto     = $_FILES['poto']['name'];
        $tmp      = $_FILES['poto']['tmp_name'];
        
        $identi        = "reply". date("m") . date("d");
        $namafoto      = $identi . $foto;
        $path          = "../images/foto/" . $namafoto;

        $kete     = $admin." menanggapi = ".$keter;

        if (move_uploaded_file($tmp, $path)) {
            $query = mysqli_query($conn, "INSERT INTO riwayat values('', '$notik', '$kete', '$namafoto', '$tgl', '$admin')");
            

            if ($query) {
                echo "<script>alert('Riwayat Ticket Berhasil ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
            } else {
                echo "<script>alert('Riwayat Ticket Gagal ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
            }
        } else {
            $query = mysqli_query($conn, "INSERT INTO riwayat values('', '$notik', '$kete', '', '$tgl', '$admin')");
            

            if ($query) {
                echo "<script>alert('Riwayat Ticket Berhasil ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
            } else {
                echo "<script>alert('Riwayat Ticket Gagal ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
            }
        }

        break;

    case 4:
        //insert closed
        $admin    = $_POST['adminn'];
        $notik    = $_POST['notikk'];
        $tgl      = $_POST['tgl'];
        $keter    = $_POST['kete'];

        $kete     = $admin." menanggapi = ".$keter." - WO CLOSED -";

        $query3 = mysqli_query($conn, "UPDATE ticket SET holdby='$admin', status='closed' WHERE notiket='$notik'");

        $query1 = mysqli_query($conn, "UPDATE perform SET status='done' WHERE notiket='$notik'");
   
        $query = mysqli_query($conn, "INSERT INTO riwayat values('', '$notik', '$kete', '', '$tgl', '$admin')");

        if ($query) {
            echo "<script>alert('Riwayat Ticket Close ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
        } else {
            echo "<script>alert('Riwayat Ticket Close ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
        }
        
        

        break;

    case 5:
        //insert user
        $nama      = $_POST['nama'];
        $username  = $_POST['username'];
        $password  = md5($_POST['password']);
        $divisi    = $_POST['divisi'];
        $role      = $_POST['role'];
   
        $query = mysqli_query($conn, "INSERT INTO tb_user values('', '$username', '$password', '$nama', '$divisi', '$role')");

        if ($query) {
            echo "<script>alert('User Berhasil ditambah!'); window.location = 'user.php'</script>";
        } else {
            echo "<script>alert('User Gagal ditambah!'); window.location = 'user.php'</script>";
        }
        
        

        break;

    case 6:
        //Edit user
        $no        = $_POST['userid'];
        $nama      = $_POST['nama'];
        $username  = $_POST['username'];
        $password  = md5($_POST['password']);
   
        $query = mysqli_query($conn, "UPDATE tb_user SET username='$username', password='$password', fullname='$nama' WHERE user_id='$no'");

        if ($query) {
            echo "<script>alert('User Berhasil diedit!'); window.location = 'user.php'</script>";
        } else {
            echo "<script>alert('User Gagal diedit!'); window.location = 'user.php'</script>";
        }

    case 7:
        //insert reject
        $admin    = $_POST['adminn'];
        $notik    = $_POST['notikk'];
        $tgl      = $_POST['tgl'];
        $keter    = $_POST['kete'];

        $kete     = $admin." menanggapi = ".$keter." - WO REJECTED -";

        $query3 = mysqli_query($conn, "UPDATE ticket SET holdby='$admin', status='reject' WHERE notiket='$notik'");

        $query1 = mysqli_query($conn, "UPDATE perform SET status='done' WHERE notiket='$notik'");
   
        $query = mysqli_query($conn, "INSERT INTO riwayat values('', '$notik', '$kete', '', '$tgl', '$admin')");

        if ($query) {
            echo "<script>alert('Riwayat Ticket Berhasil ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
        } else {
            echo "<script>alert('Riwayat Ticket Gagal ditambah!'); window.location = 'tiketedit.php?tikk=$notik'</script>";
        }
        
        

        break;
        
        

        break;

    


}
