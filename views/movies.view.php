<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
    
    <div class="uk-grid">
        <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">

           <?php require 'sidebar.php'; ?>

       </div>

       <div id="tm-right-section" class="uk-width-large-8-10 uk-width-medium-7-10">

        <div class="uk-margin">
            <h1 class="uk-heading-small pagetitle"><?php echo _MOVIESPAGETITLE ?></h1>
        </div>

        <?php require 'search-form.php'; ?>

            <div class="uk-grid">

                <?php foreach($qResults as $item): ?>

                    <div class="uk-width-1-3 uk-width-medium-1-3 uk-width-large-1-5 uk-margin-bottom">
                    <div class="uk-overlay uk-overlay-hover">
                        <img src="<?php echo $urlPath->image($item['movie_image']); ?>" alt="Image">
                        <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background uk-overlay-icon"></div>
                        <a class="uk-position-cover" href="<?php echo $urlPath->movie($item['movie_id'], $item['movie_slug']); ?>"></a>
                    </div>
                    <div class="uk-panel">
                        
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

        <?php if (!empty($errors)):?>
            <?php echo $errors; ?>
        <?php endif; ?>

        <?php if (!empty($qResults)):?>
            <?php require 'pagination.php'; ?>
        <?php endif; ?>

    </div>
</div>
</div>