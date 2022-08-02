
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="riwayat.php" method="POST">
                    <input class="au-input au-input--xl" type="text" name="notikk" placeholder="Search ticket..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                
                
                    <!--
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu"></div>
                        <div class="noti__item js-item-menu"></div>
                        <div class="noti__item js-item-menu"></div>
                        <div class="noti__item js-item-menu"></div>
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="quantity">3</span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">

                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c2 img-cir img-40">
                                        <i class="zmdi zmdi-account-box"></i>
                                    </div>
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c3 img-cir img-40">
                                        <i class="zmdi zmdi-file-text"></i>
                                    </div>
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#rubahpass">Rubah Password Account</button>
                    <!-- batas rubah pass -->
                    <div class="account-wrap" style="padding: 10px">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="../images/icon/avatar-01.jpg" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $user_login['username']; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="../images/icon/avatar-01.jpg" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo $user_login['username']; ?></a>
                                        </h5>
                                        <span class="email"><?php echo $user_login['fullname']; ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a type="button" data-toggle="modal" data-target="#rubahpass" href="#" data-toggle="modal" data-target="#rubahpass">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</header>

<section>
    <!-- tambah user -->
    <div id="rubahpass" class="modal fade">
     <div class="modal-dialog">
      <div class="modal-content">
           <div class="modal-header">
                <h4>Edit User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <?php 

           ?>
           <div class="modal-body">
                <form method="post" action="insert.php?mode=6">
                 <label>Nama Lengkap</label>
                    <input type="hidden" id="userid" name="userid" value="<?php echo $user_login['user_id']; ?>">
                    <input type="text" id="nama" name="nama" value="<?php echo $user_login['fullname']; ?>" class="form-control">
                 <br/>
                 <label>Username</label>
                    <input type="text" id="username" name="username" value="<?php echo $user_login['username']; ?>" class="form-control">
                 <br/>
                 <label>Ketik Password Baru</label>
                    <input type="Password" id="password" name="password" class="form-control">
                 <br/>
                 <input type="submit" name="insert" id="insert" value="Edit Data" class="btn btn-success" />
                 <br/>
                </form>
          </div>
       </div>
      </div>
     </div>
</section>
<!-- END PAGE CONTAINER-->