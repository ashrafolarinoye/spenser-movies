    <div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">

        <div class="uk-grid">
            <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">

             <?php require 'sidebar.php'; ?>

         </div>

         <div id="tm-right-section" class="uk-width-medium-7-10 uk-width-large-8-10">

            <h4 class="title"><?php echo _FEATUREDMOVIES; ?></h4>

            <div class="uk-slidenav-position uk-margin-large-bottom" data-uk-slider="{infinite: false}">

                <div class="uk-slider-container">
                    <ul class="uk-slider uk-grid">

                        <?php foreach($featuredMovies as $item): ?>
                            <li class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-4">
                                <a href="<?php echo $urlPath->movie($item['movie_id'], $item['movie_slug']); ?>">
                                    <figure class="uk-overlay featuredslide">
                                        <img src="<?php echo $urlPath->image($item['movie_image']); ?>" height="350">
                                        <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom">
                                            <h3 class="uk-text-truncate" id="title"><?php echo echoOutput($item['movie_title']); ?></h3>
                                            <p class="rating">
                                                <i class="ion-ios-star"></i>
                                                <?php echo showRating($item['movie_rate']); ?>
                                            </p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous uk-hidden-small" data-uk-slider-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next uk-hidden-small" data-uk-slider-item="next"></a>

            </div>

            <h4 class="title">
                <?php echo _RECENTMOVIES; ?>
                <a class="viewall" href="<?php echo $urlPath->movies(); ?>"><i class="uk-icon-play"></i> <?php echo _VIEWALL; ?></a>
            </h4>

            <div class="uk-grid uk-margin-large-bottom">

                <?php foreach($recentMovies as $item): ?>

                    <div class="uk-width-1-3 uk-width-medium-1-3 uk-width-large-1-5 uk-margin-bottom">
                        <div class="uk-overlay uk-overlay-hover">
                            <img src="<?php echo $urlPath->image($item['movie_image']); ?>" alt="Image">
                            <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background uk-overlay-icon"></div>
                            <a class="uk-position-cover" href="<?php echo $urlPath->movie($item['movie_id'], $item['movie_slug']); ?>"></a>
                        </div>
                        <div class="uk-panel home">

                            <h5 class="uk-panel-title uk-text-truncate"><?php echo echoOutput($item['movie_title']); ?></h5>
                            <p>
                                <span class="uk-display-block uk-text-muted">
                                    <?php echo echoOutput($item['movie_year']); ?>
                                </span>
                            </p>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            

            <h4 class="title"><?php echo _FEATUREDSERIES; ?></h4>

            <div class="uk-slidenav-position uk-margin-large-bottom" data-uk-slider="{infinite: false}">

                <div class="uk-slider-container">
                    <ul class="uk-slider uk-grid">

                        <?php foreach($featuredSeries as $item): ?>
                            <li class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-4">
                                <a href="<?php echo $urlPath->serie($item['serie_id'], $item['serie_slug']); ?>">
                                    <figure class="uk-overlay featuredslide">
                                        <img src="<?php echo $urlPath->image($item['serie_image']); ?>" height="350">
                                        <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom">
                                            <h3 class="uk-text-truncate" id="title"><?php echo echoOutput($item['serie_title']); ?></h3>
                                            <p class="rating">
                                                <i class="ion-ios-star"></i>
                                                <?php echo showRating($item['serie_rate']); ?>
                                            </p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>

            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous uk-hidden-small" data-uk-slider-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next uk-hidden-small" data-uk-slider-item="next"></a>

            </div>

            <h4 class="title">
                <?php echo _RECENTSERIES; ?>
                <a class="viewall" href="<?php echo $urlPath->series(); ?>"><i class="uk-icon-play"></i> <?php echo _VIEWALL; ?></a>
            </h4>


            <div class="uk-grid uk-margin-large-bottom">

                <?php foreach($recentSeries as $item): ?>

                    <div class="uk-width-1-3 uk-width-medium-1-3 uk-width-large-1-5 uk-margin-bottom">
                        <div class="uk-overlay uk-overlay-hover">
                            <img src="<?php echo $urlPath->image($item['serie_image']); ?>" alt="Image">
                            <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background uk-overlay-icon"></div>
                            <a class="uk-position-cover" href="<?php echo $urlPath->serie($item['serie_id'], $item['serie_slug']); ?>"></a>
                        </div>
                        <div class="uk-panel">

                            <h5 class="uk-panel-title uk-text-truncate"><?php echo echoOutput($item['serie_title']); ?></h5>
                            <p>
                                <span class="uk-display-block uk-text-muted">
                                    <?php echo echoOutput($item['serie_year']); ?>
                                </span>
                            </p>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>