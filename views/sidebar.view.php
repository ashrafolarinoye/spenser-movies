    <div class="sidebar">


            <?php if ($sidebarAd): ?>
            <div id="sidebarAd"><?php echo $sidebarAd; ?></div>
            <?php endif; ?>

        <div class="uk-panel uk-margin-large-bottom">
            
            <p class="title-divider"><?php echo _TOPMOVIES; ?></p>
            <?php foreach($topMovies as $key => $item): ?>
                <div class="uk-grid uk-flex-middle uk-margin-top uk-margin-bottom topitems" data-uk-grid-margin="">
                    <div class="uk-width-medium-1-3 uk-row-first uk-cover-background">
                        <a href="<?php echo $urlPath->movie($item['movie_id'], $item['movie_slug']); ?>">
                            <img src="<?php echo $urlPath->image($item['movie_image']); ?>">
                        </a>
                    </div>
                    <div class="uk-width-medium-2-3 uk-flex-middle padding-left">
                        <p class="number uk-text-contrast"><?php echo showOrder($key); ?></p>
                        <a class="uk-link-muted title" href="<?php echo $urlPath->movie($item['movie_id'], $item['movie_slug']); ?>">
                            <?php echo echoOutput($item['movie_title']); ?>
                        </a>
                        <p class="rating"><i class="ion-ios-star"></i> <?php echo showRating($item['movie_rate']); ?></p>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="uk-panel uk-margin-large-bottom">
            
            <p class="title-divider"><?php echo _TOPSERIES; ?></p>
            <?php foreach($topSeries as $key => $item): ?>
                <div class="uk-grid uk-flex-middle uk-margin-top uk-margin-bottom topitems" data-uk-grid-margin="">
                    <div class="uk-width-medium-1-3 uk-row-first uk-cover-background">
                        <a href="<?php echo $urlPath->serie($item['serie_id'], $item['serie_slug']); ?>">
                            <img src="<?php echo $urlPath->image($item['serie_image']); ?>">
                        </a>
                    </div>
                    <div class="uk-width-medium-2-3 uk-flex-middle padding-left">
                        <p class="number uk-text-contrast"><?php echo showOrder($key); ?></p>
                        <a class="uk-link-muted uk-text-truncate title" href="<?php echo $urlPath->serie($item['serie_id'], $item['serie_slug']); ?>">
                            <?php echo echoOutput($item['serie_title']); ?>
                        </a>
                        <p class="rating"><i class="ion-ios-star"></i> <?php echo showRating($item['serie_rate']); ?></p>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="uk-panel uk-margin-large-bottom">

            <p class="title-divider"><?php echo _GENRES; ?></p>

            <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav="">
                <li class="uk-parent">
                    <a href="#"><?php echo _MOVIESPAGETITLE; ?></a>
                    <ul class="uk-nav-sub">
                        <?php foreach($moviesGenres as $item): ?>
                        <li><a href="<?php echo $urlPath->genre('movies', $item['genre_id']); ?>"><?php echo echoOutput($item['genre_title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>

            <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav="">
                <li class="uk-parent">
                    <a href="#"><?php echo _SERIESPAGETITLE; ?></a>
                    <ul class="uk-nav-sub">
                        <?php foreach($seriesGenres as $item): ?>
                        <li><a href="<?php echo $urlPath->genre('series', $item['genre_id']); ?>"><?php echo echoOutput($item['genre_title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>

        </div>


        <div class="uk-panel uk-margin-large-bottom">
            
            <p class="title-divider"><?php echo _LINKSTEXT; ?></p>
            <ul class="uk-nav uk-nav-side uk-nav-parent-icon uk-margin-bottom" data-uk-nav="">

                    <?php foreach($navigationSidebar as $nav): ?>
                        <?php if ($nav['navigation_type'] == 'custom') { ?>
                                <li><a href="//<?php echo $nav['navigation_url']; ?>" target="<?php echo echoOutput($nav['navigation_target']); ?>"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo $urlPath->page($nav['navigation_url']); ?>" target="<?php echo echoOutput($nav['navigation_target']); ?>"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
                        <?php } ?>
                    <?php endforeach; ?>
            </ul>
        </div>


    </div>
