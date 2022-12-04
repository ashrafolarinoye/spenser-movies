<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <div class="uk-panel">
            <form class="uk-search" action="<?php echo $urlPath->search(); ?>" method="GET">
                <input class="uk-search-field" type="search" name="query" placeholder="<?php echo _SEARCHPLACEHOLDER ?>">
            </form>

            <hr>

            <?php if (!isLogged()): ?>

                    <a class="uk-button uk-button-primary uk-button-large uk-width-1-1" href="https://wa.link/3naull"><img src="https://spensermediatv.com.ng/images/icons8-chat-message-32.png"></i>Request a movie</a><br/><br/>
                    <a class="uk-button uk-button-primary uk-button-large uk-width-1-1" href="http://T.me/spensermediatv"><img src="https://spensermediatv.com.ng/images/icons8-telegram-32.png"></i>Telegram</a>
            <?php endif; ?>

            <?php if (isLogged()): ?>

                <div class="uk-width-1-1">

                    <article class="uk-comment uk-position-relative">
                        <header class="uk-comment-header">
                            <a href="<?php echo $urlPath->profile(); ?>">
                            <img class="uk-comment-avatar uk-border-rounded" src="<?php echo getGravatar($userInfo['user_email']); ?>" width="50" height="50">
                            </a>
                            <h4 class="uk-comment-title uk-text-contrast uk-text-truncate"><?php echo echoOutput($userInfo['user_name']); ?> 
                                <a href="<?php echo $urlPath->signout(); ?>">
                                <span class="uk-text-muted uk-text-large"><i class="ion-android-exit"></i></span>
                                </a>
                            </h4>
                            <div class="uk-comment-meta uk-margin-remove uk-text-truncate"><?php echo maskEmail($userInfo['user_email']); ?></div>
                        </header>
                    </article>
                </div>

            <?php endif; ?>

            <hr>

            <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon uk-margin-bottom" data-uk-nav="">
                <li class="uk-parent">
                    <a href="#"><?php echo _MOVIESPAGETITLE; ?></a>
                    <ul class="uk-nav-sub">
                        <p class="uk-nav-header uk-text-left uk-padding-remove uk-margin-small-bottom"><?php echo _GENRES; ?></p>
                        <?php foreach($moviesGenres as $item): ?>
                        <li><a href="<?php echo $urlPath->genre('movies', $item['genre_id']); ?>"><?php echo echoOutput($item['genre_title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>

            <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon uk-margin-bottom" data-uk-nav="">
                <li class="uk-parent">
                    <a href="#"><?php echo _SERIESPAGETITLE; ?></a>
                    <ul class="uk-nav-sub">
                        <p class="uk-nav-header uk-text-left uk-padding-remove uk-margin-small-bottom"><?php echo _GENRES; ?></p>
                        <?php foreach($seriesGenres as $item): ?>
                        <li><a href="<?php echo $urlPath->genre('series', $item['genre_id']); ?>"><?php echo echoOutput($item['genre_title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>

            <?php if($navigationSidebar): ?>
                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
                <p class="uk-nav-header uk-text-left uk-padding-remove"><?php echo _LINKSTEXT; ?></p>

                <?php foreach($navigationSidebar as $nav): ?>
                    <?php if ($nav['navigation_type'] == 'custom') { ?>
                    <li><a href="//<?php echo $nav['navigation_url']; ?>" target="<?php echo echoOutput($nav['navigation_target']); ?>" class="uk-text-truncate"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
                    <?php } else { ?>
                    <li><a href="<?php echo $urlPath->page($nav['navigation_url']); ?>" target="<?php echo echoOutput($nav['navigation_target']); ?>" class="uk-text-truncate"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
                    <?php } ?>
                <?php endforeach; ?>
            </ul>
         <?php endif; ?>

         <?php if($arraysm): ?>
            <div class="uk-panel socialmedia">
                <p class="uk-nav-header uk-text-left uk-padding-remove"><?php echo _FOLLOWUS; ?></p>

                <div class="uk-button-group">
                    <?php foreach($arraysm as $fs): ?>
                        <?php if (!empty($fs[0])) { ?>
                        <a class="uk-button uk-button-default uk-button-large uk-margin-small-right uk-margin-small-left " href="<?php echo $fs[0] ?>" target="_blank"><i class="uk-icon-facebook"></i></a>
                        <?php } ?>
                        <?php if (!empty($fs[1])) { ?>
                        <a class="uk-button uk-button-default uk-button-large uk-margin-small-right" href="<?php echo $fs[1] ?>" target="_blank"><i class="uk-icon-twitter"></i></a>
                        <?php } ?>
                        <?php if (!empty($fs[2])) { ?>
                        <a class="uk-button uk-button-default uk-button-large uk-margin-small-right" href="<?php echo $fs[2] ?>" target="_blank"><i class="uk-icon-youtube"></i></a>
                        <?php } ?>
                        <?php if (!empty($fs[3])) { ?>
                        <a class="uk-button uk-button-default uk-button-large uk-margin-small-right" href="<?php echo $fs[3] ?>" target="_blank"><i class="uk-icon-instagram"></i></a>
                        <?php } ?>
                    <?php endforeach; ?>

                </div>

            </div>
            <?php endif; ?>

        </div>
    </div>

</div>

