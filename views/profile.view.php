

<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">

    <div class="uk-grid">

        <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10">

            <div class="uk-panel sidebar-profile uk-text-center uk-margin-large-bottom">

                <figure class="uk-overlay uk-overlay-hover uk-margin-bottom">
                    <img class="uk-border-rounded" src="<?php echo getGravatar($userInfo['user_email']); ?>">
                    <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-ignore"><a href="https://gravatar.com/" target="_blank" class="uk-text-contrast uk-text-small"><?php echo _CHANGEAVATAR ?></a></figcaption>
                    
                </figure>

                <span class="uk-text-muted uk-display-block"><?php echo maskEmail($userInfo['user_email']); ?></span>

                <hr class="uk-margin-bottom">

                <dl class="uk-description-list-line uk-text-left">
                    <dt class="uk-text-contrast"><?php echo _NAMEPROFILE ?></dt>
                    <dd class="uk-text-nowrap"><?php echo echoOutput($userInfo['user_name']); ?></dd>
                    <dt class="uk-text-contrast uk-margin-top"><?php echo _EMAILPROFILE ?></dt>
                    <dd class="uk-text-nowrap"><?php echo echoOutput($userInfo['user_email']); ?></dd>
                    <dt class="uk-text-contrast uk-margin-top"><?php echo _MEMBERSINCE ?></dt>
                    <dd class="uk-text-nowrap"><?php echo formatDate($userInfo['user_created']); ?></dd>
                </dl>

                <hr class="uk-margin-top">

                <a href="<?php echo $urlPath->profile('edit'); ?>" class="uk-button uk-button-default uk-width-1-1">
                    <i class="ion-android-create uk-float-right"></i> <?php echo _EDITPROFILE ?>
                </a>

            </div>

        </div>

        
        <div class="uk-width-large-8-10 uk-width-medium-7-10">

            <?php if (!isEditing()): ?>


            <h1 class="uk-heading-small pagetitle"><?php echo _MYMOVIES ?></h1>


            <?php if (!empty($userFavoritesMovies)):?>
                <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-6 uk-margin-large-bottom" data-uk-grid="{gutter: 10, animation: false}">
                    
                    <?php foreach($userFavoritesMovies as $item): ?>

                        <div>

                            <figure class="uk-overlay">

                                <a class="removemovie uk-button uk-button-small uk-position-top-right uk-margin-small-right uk-margin-small-top" data-item="<?php echo $item['item']; ?>"><i class="ion-android-close"></i></a>

                                <a href="<?php echo $urlPath->movie($item['item'], $item['slug']); ?>">
                                    <img class="uk-border-rounded" src="<?php echo $urlPath->image($item['image']); ?>">
                                    <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom">
                                        <h5 class="uk-text-small uk-text-truncate"><?php echo echoOutput($item['title']); ?></h5>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
            
            <?php if (empty($userFavoritesMovies)):?>
                <p class="uk-text-center uk-text-muted"><?php echo _NODATAFOUND ?></p>
            <?php endif;?>

            <h1 class="uk-heading-small pagetitle"><?php echo _MYSERIES ?></h1>

            <?php if (!empty($userFavoritesSeries)):?>

                <div class="uk-grid-width-small-1-3 uk-grid-width-medium-1-4 uk-grid-width-large-1-6 uk-margin-large-bottom" data-uk-grid="{gutter: 10, animation: false}">
                    
                    <?php foreach($userFavoritesSeries as $item): ?>

                        <div>

                            <figure class="uk-overlay">

                                <a class="removeserie uk-button uk-button-small uk-position-top-right uk-margin-small-right uk-margin-small-top" data-item="<?php echo $item['item']; ?>"><i class="ion-android-close"></i></a>

                                <a href="<?php echo $urlPath->serie($item['item'], $item['slug']); ?>">
                                    <img class="uk-border-rounded" src="<?php echo $urlPath->image($item['image']); ?>">
                                    <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom">
                                        <h5 class="uk-text-small uk-text-truncate"><?php echo echoOutput($item['title']); ?></h5>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>

                    <?php endforeach; ?>


                </div>
            <?php endif; ?>

            <?php if (empty($userFavoritesSeries)):?>
                <p class="uk-text-center uk-text-muted"><?php echo _NODATAFOUND ?></p>

            <?php endif;?>

            <?php endif;?>

            <?php if (isEditing()): ?>

            <?php require './views/edit-profile.view.php'; ?>

            <?php endif;?>




        </div>



    </div>

</div>






