<nav id="navigation" class="navigation-sidebar navbar-expand-lg static-top bg-primary">
    <div class="navigation-header">
        <a href="<?php echo _SITE_URL ?>/admin/index.php"><img src="../assets/images/wbdashboard.png" style="max-width: 130px;"></a>
    </div>

    <div class="welcome">
        Welcome, <b><?php echo $user['user_name']; ?></b> <a href="../controller/logout.php" style="color: #fff; top: 2px; position: relative; margin-left: 8px; font-weight: 300;"><i class="dripicons-exit"></i></a>
    </div>

    <!--Navigation Menu Links-->
    <div class="navigation-menu">

        <ul class="menu-items custom-scroll">

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/movies.php">
                    <span class="icon-thumbnail"><i class="dripicons-camcorder"></i></span>
                    <span class="title">Movies</span>
                </a>
            </li>

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/series.php">
                    <span class="icon-thumbnail"><i class="dripicons-media-next"></i></span>
                    <span class="title">Series</span>
                </a>
            </li>

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/episodes.php">
                    <span class="icon-thumbnail"><i class="dripicons-view-list"></i></span>
                    <span class="title">Episodes</span>
                </a>
            </li>

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/genres.php">
                    <span class="icon-thumbnail"><i class="dripicons-folder"></i></span>
                    <span class="title">Genres</span>
                </a>
            </li>

            <!--<li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/strings.php">
                    <span class="icon-thumbnail"><i class="dripicons-flag"></i></span>
                    <span class="title">Strings</span>
                </a>
            </li>-->

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/pages.php">
                    <span class="icon-thumbnail"><i class="dripicons-document-new"></i></span>
                    <span class="title">Pages</span>
                </a>
            </li>

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/menus.php">
                    <span class="icon-thumbnail"><i class="dripicons-list"></i></span>
                    <span class="title">Menus</span>
                </a>
            </li>

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/users.php">
                    <span class="icon-thumbnail"><i class="dripicons-user"></i></span>
                    <span class="title">Users</span>
                </a>
            </li>

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/settings.php">
                    <span class="icon-thumbnail"><i class="dripicons-gear"></i></span>
                    <span class="title">Settings</span>
                </a>
            </li>

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/ads.php">
                    <span class="icon-thumbnail"><i class="dripicons-direction"></i></span>
                    <span class="title">Ads</span>
                </a>
            </li>


            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/smtp.php">
                    <span class="icon-thumbnail"><i class="dripicons-swap"></i></span>
                    <span class="title">SMTP</span>
                </a>
            </li>

            <li>
                <a href="<?php echo _SITE_URL ?>/admin/controller/brand.php">
                    <span class="icon-thumbnail"><i class="dripicons-bookmarks"></i></span>
                    <span class="title">Brand</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<div class="header fixed-header">
    <div class="container-fluid" style="padding: 14px 25px">
        <div class="row">
            <div class="col-7 col-md-6 d-lg-none">
                <a id="toggle-navigation" href="javascript:void(0);" class="icon-btn mr-3"><i class="fa fa-bars"></i></a>
                <img src="../assets/images/wbdashboard-dark.png" style="max-width: 139px; position: relative; top: -5px;    margin-left: 10px;
                ">
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <p style="position: relative; top: -3px;">Welcome, <b><?php echo $user['user_name']; ?></b> <a href="../controller/logout.php" style="color: var(--primary-color); top: 6px; position: relative; margin-left: 8px; font-weight: 300;font-size: 22px;"><i class="dripicons-exit"></i></a></p>
            </div>

            <div class="col-lg-6 d-none d-lg-block">
                <p style="position: relative; float: right;"> <a href="<?php echo _SITE_URL ?>" style="color: var(--primary-color); top: -2px; position: relative; margin-right: 8px; font-weight: 300; font-size: 14px; margin-left: 6px;"><i class="dripicons-preview" style="top: 5px; position: relative; font-size: 22px; margin-right: 6px;"></i> View Site</a></p>
            </div>

        </div>
    </div>
</div>