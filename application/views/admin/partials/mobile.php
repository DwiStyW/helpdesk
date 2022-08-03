<?php
// $user_id = $_SESSION['user_id'];
// $query_user_login = mysqli_query($conn, "SELECT * from tb_user where user_id='$user_id'");
// $user_login = mysqli_fetch_array($query_user_login);

?>
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="<?= base_url() ?>assets/images/logo.png" alt="INDOSAR" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="index.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
            </ul>
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="tiket.php">
                        <i class="fas fa-file"></i>Ticket</a>
                </li>
            </ul>
            <?php if ($user_login['role'] == 'admin') { ?>
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a class="js-arrow" href="user.php">
                            <i class="fas fa-user"></i>User</a>
                    </li>
                </ul>
            <?php } ?>
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="logout.php">
                        <i class="fas fa-window-close"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
</header>