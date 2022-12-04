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
        <div class=" uk-vertical-align-middle uk-text-center uk-width-medium-3-10 uk-width-large-2-10 uk-container-center">

            <form class="uk-form" action="<?php echo htmlspecialchars($urlPath->forgot()); ?>" name="forgot" method="post">
                <h2 class="uk-text-light"><?php echo _FORGOTPASS ?></h2>

                <p class="uk-margin-large-bottom uk-text-muted"><?php echo _RESETYOURPASSSUB ?></p>

                <?php if(!empty($errors)): ?>
                    <span><?php echo $errors; ?></span>
                <?php endif; ?>

                <div class="uk-form-row">
                    <div class="uk-form-icon uk-form-icon-flip uk-width-1-1">
                        <input type="email" name="user_email" class="uk-width-1-1" placeholder="<?php echo _USEREMAIL ?>" required>
                        <i class="uk-icon-envelope"></i>
                    </div>
                    <div id="user_email_validate" class="validation"></div>
                </div>

                <div class="uk-form-row">
                    <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit"><?php echo _SUBMITBUTTON ?></button>
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
                    <li><a href="//<?php echo echoOutput($nav['navigation_url']); ?>" target="<?php echo echoOutput($nav['navigation_target']); ?>"><?php echo $nav['navigation_label']; ?></a></li>
            <?php } else { ?>
                <li><a href="<?php echo $urlPath->page($nav['navigation_url']); ?>" target="<?php echo echoOutput($nav['navigation_target']); ?>"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
            <?php } ?>
        <?php endforeach; ?>
                </ul>

            </div>
        </div>


</div>
</footer>
</div>