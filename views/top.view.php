
    <nav id="tm-topbar" class="uk-navbar uk-contrast">
        <div class="uk-container uk-container-center">
            <ul class="uk-navbar-nav uk-hidden-small">
<?php foreach($arraysm as $fs): ?>
    <?php if (!empty($fs[0])) { ?>
        <li><a href="<?php echo $fs[0] ?>" class="uk-text-muted" target="_blank"><i class="uk-icon-facebook uk-icon-small"></i></a></li>
    <?php } ?>
    <?php if (!empty($fs[1])) { ?>
    <li><a href="<?php echo $fs[1] ?>" class="uk-text-muted" target="_blank"><i class="uk-icon-twitter uk-icon-small"></i></a></li>
    <?php } ?>
    <?php if (!empty($fs[2])) { ?>
    <li><a href="<?php echo $fs[2] ?>" class="uk-text-muted" target="_blank"><i class="uk-icon-youtube-play uk-icon-small"></i></a></li>
    <?php } ?>
    <?php if (!empty($fs[3])) { ?>
    <li><a href="<?php echo $fs[3] ?>" class="uk-text-muted" target="_blank"><i class="uk-icon-instagram uk-icon-small"></i></a></li>
    <?php } ?>
<?php endforeach; ?>
        </ul>
            <div class="uk-navbar-flip">

                <ul class="uk-navbar-nav uk-hidden-small">
<?php foreach($navigationHeader as $nav): ?>
    <?php if ($nav['navigation_type'] == 'custom') { ?>
            <li><a href="//<?php echo $nav['navigation_url']; ?>" target="<?php echo $nav['navigation_target']; ?>"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
    <?php } else { ?>
        <li><a href="<?php echo $urlPath->page($nav['navigation_url']); ?>" target="<?php echo $nav['navigation_target']; ?>"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
    <?php } ?>
<?php endforeach; ?>
        </ul>
            </div>
        </div>
        
    </nav>


        <nav id="tm-header" class="uk-navbar">
            <div class="uk-container uk-container-center">
                <a class="uk-navbar-brand uk-logo uk-hidden-small" href="<?php echo $urlPath->home(); ?>"><img class="uk-margin uk-margin-remove" alt="logo" src="<?php echo $urlPath->image($brand['st_whitelogo']); ?>" /></a>
                
                <form class="uk-search uk-margin-small-top uk-margin-large-left uk-hidden-small" action="<?php echo $urlPath->search(); ?>" method="GET">
                    <input class="uk-search-field" type="search" name="query" placeholder="<?php echo _SEARCHPLACEHOLDER ?>" autocomplete="off" required>
                </form>
                    <div class="uk-navbar-flip uk-hidden-small">

                        <?php if (isLogged()): ?>

                            <div class="loggednav uk-hidden-medium">
                                <ul class="uk-subnav uk-subnav-line uk-margin-bottom-remove">

                                    <li><a href="<?php echo $urlPath->signout(); ?>" class="uk-button uk-link-muted uk-button-link uk-button-small"><i class="ion-android-lock"></i> <?php echo _SIGNOUT ?></a></li>
                                    <li><a href="<?php echo $urlPath->profile(); ?>" class="uk-button uk-link-muted uk-button-link uk-button-small"><i class="ion-android-person"></i> <?php echo _PROFILE ?></a></li>
                                    <li><a href="<?php echo $urlPath->profile(); ?>" class="uk-button uk-link-muted uk-button-link uk-button-small"><i class="ion-android-favorite"></i> <?php echo _FAVORITES ?></a></li>
                                    <?php if (isAdmin($connect)): ?>
                                    <li><a href="<?php echo $urlPath->admin(); ?>" class="uk-button uk-text-warning uk-link-muted uk-button-link uk-button-small"><i class="ion-android-settings"></i> <?php echo _DASHBOARD ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                            <a href="<?php echo $urlPath->profile(); ?>" class="uk-text-contrast uk-text-middle uk-display-inline-block uk-text-right">
                                <?php echo echoOutput($userInfo['user_name']); ?><br>
                                <span class="uk-text-muted uk-text-small uk-text-truncate"><?php echo maskEmail($userInfo['user_email']); ?></span>
                            </a>

                            <a href="<?php echo $urlPath->profile(); ?>">
                                <img class="tm-avatar" src="<?php echo getGravatar($userInfo['user_email']); ?>" width="40" height="40">
                            </a>

                        <?php endif; ?>
                        <?php if (!isLogged()): ?>

                            <div class="uk-button-group">

                                <a class="uk-button uk-button-link uk-button-large" href="<?php echo $urlPath->signup(); ?>"><?php echo _SIGNUP ?>
                                </a>
                                <a class="uk-button uk-button-primary uk-button-large uk-margin-left" href="<?php echo $urlPath->signin(); ?>"><i class="uk-icon-lock uk-margin-small-right"></i> <?php echo _SIGNIN ?></a>
                            </div>

                        <?php endif; ?>

                    </div>
                    <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small uk-icon-medium" data-uk-offcanvas></a>
                    <div class="uk-navbar-flip uk-visible-small">
                        <a href="#offcanvas" class="uk-navbar-toggle uk-navbar-toggle-alt uk-icon-medium" data-uk-offcanvas></a>
                    </div>
                    <div class="uk-navbar-center uk-visible-small">
                        <a href="<?php echo $urlPath->home(); ?>">
                            <img alt="logo" src="<?php echo $urlPath->image($brand['st_whitelogo']); ?>"/>
                        </a>
                    </div>

                </div>
            </nav>

            <?php if ($headerAd): ?>
            <div class="uk-container uk-container-center">
            <div id="headerAd"><?php echo $headerAd; ?></div>
            </div>
            <?php endif; ?>

