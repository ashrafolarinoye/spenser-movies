<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
    <div class="uk-grid">

        <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">
            
            <?php require 'sidebar.php'; ?>

        </div>

        <div id="tm-right-section" class="uk-width-large-8-10 uk-width-medium-7-10" data-uk-scrollspy="{cls:'uk-animation-fade', target:'img'}">

            <div id="tm-media-section" class="">

                <div class="uk-container uk-container-center uk-width-10-10">
                    <div class="media-container uk-container-center">
                        
                        <?php require 'player.php'; ?>

                    </div>

                    <div class="uk-grid">

                        <?php if(!isWatch()): ?>

                        <div class="uk-width-medium-3-10">

                            <div  class="media-cover uk-text-center">
                                <img src="<?php echo $urlPath->image($itemDetails['serie_image']); ?>" alt="Image" class="uk-scrollspy-inview uk-animation-fade">
                            </div>
                            <a class="uk-button uk-button-primary uk-button-active uk-button-large uk-width-1-1 uk-margin-top" href="#episodes" data-uk-smooth-scroll="{offset: 20}"><i class="uk-icon-television uk-margin-small-right"></i> <?php echo _WATCHNOW ?></a>


                            <?php if(isLogged() && $isInFavorites == 0): ?>

                                <a class="unfavserie uk-hidden uk-button uk-button-link uk-text-muted uk-button-large uk-width-1-1 uk-margin-top uk-margin-bottom" data-item="<?php echo $itemDetails['id']; ?>"><i class="uk-icon-close uk-margin-small-right"></i> <?php echo _REMOVEFAVORITE ?></a>

                                <a class="favserie uk-button uk-button-link uk-text-muted uk-button-large uk-width-1-1 uk-margin-top uk-margin-bottom" data-item="<?php echo $itemDetails['id']; ?>"><i class="uk-icon-heart uk-margin-small-right"></i> <?php echo _ADDTOFAVORITES ?></a>

                            <?php endif; ?>


                            <?php if(isLogged() && $isInFavorites == 1): ?>

                                <a class="unfavserie uk-button uk-button-link uk-text-muted uk-button-large uk-width-1-1 uk-margin-top uk-margin-bottom" data-item="<?php echo $itemDetails['id']; ?>"><i class="uk-icon-close uk-margin-small-right"></i> <?php echo _REMOVEFAVORITE ?></a>

                                <a class="favserie uk-hidden uk-button uk-button-link uk-text-muted uk-button-large uk-width-1-1 uk-margin-top uk-margin-bottom" data-item="<?php echo $itemDetails['id']; ?>"><i class="uk-icon-heart uk-margin-small-right"></i> <?php echo _ADDTOFAVORITES ?></a>

                            <?php endif; ?>

                            <?php if(!isLogged()): ?>

                                <a href="<?php echo $urlPath->signin(); ?>" class="uk-button uk-button-link uk-text-muted uk-button-large uk-width-1-1 uk-margin-top uk-margin-bottom"><i class="uk-icon-heart uk-margin-small-right"></i> <?php echo _ADDTOFAVORITES ?></a>

                            <?php endif; ?>

                        </div>
                        

                        <div class="uk-width-medium-7-10 uk-margin-large-bottom">

                            <h2 class="uk-text-contrast uk-text-bold"><?php echo echoOutput($itemDetails['serie_title']); ?></h2>
                            <ul class="uk-subnav uk-subnav-line">
                                <li class="single-rating">
                                    <i class="ion-ios-star"></i>
                                    <?php echo showRating($itemDetails['serie_rate']); ?>
                                </li>
                                <li><?php echo echoOutput($itemDetails['serie_year']); ?></li>
                            </ul>
                            <hr>
                            <p class="uk-text-muted uk-h4"><?php echo echoOutput($itemDetails['serie_description']); ?></p>
                            <dl class="uk-description-list-horizontal uk-margin-top">
                                <dt>Starring</dt>
                                <dd><ul class="uk-subnav">
                                    <?php foreach($serieStars as $item): ?>
                                        <li><?php echo $item; ?></li>
                                    <?php endforeach; ?>
                                </ul></dd>
                                <dt>Genres</dt>
                                <dd><ul class="uk-subnav">
                                    <?php foreach($serieGenres as $item): ?>
                                        <li><?php echo $item; ?></li>
                                    <?php endforeach; ?>
                                </ul></dd>
                            </dl>

                        </div>

                        <?php endif; ?>


                        <div class="uk-width-1-1">

                            <div class="uk-margin-large-top">

                                <?php require './views/trailer.view.php'; ?>

                                <?php require './views/episodes.view.php'; ?>

                                <?php require './views/share.view.php'; ?>


                                    <div class="uk-margin-large-top">
                                        <h4 class="sectiontitle"><?php echo _RATETITLE ?></h4>

                                        <?php if (isLogged() && !$isReviewed): ?>
                                            <form class="uk-form uk-margin-bottom" method="post" id="formRateSerie">
                                                <?php require 'review-form.php'; ?>
                                            </form>
                                        <?php endif; ?>
                                        
                                        <?php require './views/reviews.view.php'; ?>


                                    </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>