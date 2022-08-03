<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="#">
                    <img src="<?= base_url() ?>assets/images/icon/log.png" alt="Helpdesk INDOSAR" />
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <a href="<?= base_url('home') ?>">
                            <i class="fas fa-home"></i>Home
                            <span class="bot-line"></span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/inputtiket.php">
                            <i class="fas fa-file"></i>
                            <span class="bot-line"></span>Buat WO</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#add_data_Modal">
                            <i class="fas fa-search"></i>
                            <span class="bot-line"></span>Cek Status WO</a>
                    </li>
                    <li>
                        <a href="<?= base_url('auth') ?>">
                            <i class="fas fa-user"></i>
                            <span class="bot-line"></span>Sign IN</a>
                        </a>
                    </li>
                </ul>
            </div>





        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="images/icon/log.png" alt="CoolAdmin" />
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
                    <a href="index.php">
                        <i class="fas fa-home"></i>Home
                        <span class="bot-line"></span>
                    </a>
                </li>
                <li>
                    <a href="inputtiket.php">
                        <i class="fas fa-file"></i>
                        <span class="bot-line"></span>Buat Ticket Baru</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#add_data_Modal">
                        <i class="fas fa-search"></i>
                        <span class="bot-line"></span>Cek Status Ticket</a>
                </li>
                <li>
                    <a href="admin/index.php">
                        <i class="fas fa-user"></i>
                        <span class="bot-line"></span>Sign In</a>
                </li>
            </ul>
        </div>
    </nav>
</header>