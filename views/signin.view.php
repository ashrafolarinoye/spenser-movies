    <body class="uk-height-1-1" cz-shortcut-listen="true">

        <div class="tm-navbar tm-navbar-overlay tm-navbar-transparent tm-navbar-contrast">
            <nav class="uk-navbar uk-margin-large-top">
                <div class="uk-container-center uk-container">

                    <div class="uk-navbar-center">
                        <a href="<?php echo $urlPath->home(); ?>" class="uk-navbar-item uk-logo">
                            <img class="uk-margin uk-margin-remove" width="180" height="40" alt="logo" src="<?php echo $urlPath->image($brand['st_whitelogo']); ?>"/>
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="uk-overlay uk-text-center uk-vertical-align uk-height-1-1">
            <img class="uk-animation-fade tm-bg-cover" src="<?php echo $urlPath->assets_img('bg.jpg'); ?>" width="100%" height="100%" alt="">
            <div class="uk-vertical-align uk-overlay-panel uk-overlay-background">
                <div class=" uk-vertical-align-middle uk-text-center uk-width-medium-4-10 uk-width-small-7-10 uk-width-large-2-10 uk-container-center">

                    <form class="uk-form" action="<?php echo htmlspecialchars($urlPath->signin()); ?>" name="signin" method="post">
                        <h2 class="uk-margin-large-bottom uk-text-light"><?php echo _SIGNIN ?></h2>

                        <?php if(!empty($errors)): ?>
                            <?php echo $errors; ?>
                        <?php endif; ?>

                        <div class="uk-form-row">
                            <div class="uk-form-icon uk-form-icon-flip uk-width-1-1">
                                <input type="email" name="user_email" class="uk-width-1-1" placeholder="<?php echo _USEREMAIL ?>" required>
                                <i class="uk-icon-envelope"></i>
                            </div>
                            <div id="user_email_validate" class="validation"></div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-form-icon uk-form-icon-flip uk-width-1-1" >
                                <input type="password" name="user_password" class="uk-width-1-1" placeholder="<?php echo _USERPASSWORD ?>" required>
                                <i class="uk-icon-lock "></i>
                            </div>
                            <div id="user_password_validate" class="validation"></div>
                        </div>

                        <div class="uk-form-row uk-text-small">
                            <a class="uk-float-right uk-link-muted" href="<?php echo $urlPath->forgot(); ?>"><?php echo _FORGOTPASS ?></a>
                        </div>

                        <div class="uk-form-row">
                            <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit"><?php echo _ENTERBUTTON ?></button>
                        </div>

                        <div class="uk-form-row uk-float-left uk-text-muted">
                            <?php echo _NEWHERE ?> <a class="uk-link-muted" href="<?php echo $urlPath->signup(); ?>"><?php echo _SIGNUPNOW ?></a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

        <footer>
            <div class="uk-container-center uk-position-bottom">

                <div class="uk-padding uk-text-muted uk-text-small footer-bg">

                    <div class="uk-grid uk-inline uk-flex">
                       <div class="uk-width-medium-5-10 uk-width-large-5-10 uk-flex uk-flex-center uk-flex-middle">
                        <div><?php echo _COPYRIGHT ?></div>
                    </div>
                    <div class="uk-width-medium-5-10 uk-width-large-5-10 uk-flex uk-flex-center uk-flex-middle uk-hidden-small">
                        
                        <ul class="uk-subnav">
                            <?php foreach($navigationFooter as $nav): ?>
                                <?php if ($nav['navigation_type'] == 'custom') { ?>
                                        <li><a href="//<?php echo $nav['navigation_url']; ?>" target="<?php echo $nav['navigation_target']; ?>"><?php echo $nav['navigation_label']; ?></a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo $urlPath->page($nav['navigation_url']); ?>" target="<?php echo $nav['navigation_target']; ?>"><?php echo $nav['navigation_label']; ?></a></li>
                                <?php } ?>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                </div>

            </div>

        </div>
    </footer>

