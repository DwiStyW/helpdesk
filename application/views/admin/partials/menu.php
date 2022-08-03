<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="../index.php">
            <img src="<?= base_url() ?>assets/images/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="index.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="tiket.php">
                        <i class="fas fa-file"></i>Ticket</a>
                </li>
                <!-- <?php //if ($user_login['role'] == 'admin') { 
                        ?>
                    <li>
                        <a href="user.php">
                            <i class="fas fa-user"></i>User</a>
                    </li>
                <?php //} 
                ?> -->
            </ul>
        </nav>
    </div>
</aside>