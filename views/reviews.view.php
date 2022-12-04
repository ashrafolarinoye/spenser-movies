<?php if (isLogged() && $isReviewed): ?>

    <p class="uk-margin-top uk-margin-bottom-remove">
        <?php echo _YOURRATE ?> <?php echo showRating($isReviewed['rating']); ?> · <span class="uk-text-muted"><?php echo formatDate($isReviewed['published']); ?></span>
    </p>
    
<?php endif; ?>

<?php if (!isLogged()): ?>
    
    <a class="uk-text-muted" href="<?php echo $urlPath->signin(); ?>">
        <div class="uk-box-border">
        <?php echo _PLEASESIGNIN ?>
        <i class="ion-ios-arrow-right uk-float-right"></i>
    </div>
    </a>

<?php endif; ?>

<div class="uk-responsive-width uk-margin-large-top">

    <h4 class="sectiontitle"><?php echo _REVIEWS ?> <span class="uk-text-muted">(<?php echo count($getReviews); ?>)</span></h4>

    <ul class="uk-comment-list uk-margin-top reviews customscroll">
        <?php foreach($getReviews as $item): ?>
            <li>
                <article class="uk-comment uk-panel uk-panel-space uk-panel-box-secondary">
                    <header class="uk-comment-header">
                        <h4 class="uk-comment-title uk-text-muted"><?php echo maskEmail($item['user']); ?></h4>
                        <h4 class="uk-comment-title"><?php echo showStars($item['rating']); ?> · <span class="uk-text-muted uk-text-small"><?php echo formatDate($item['published']); ?></span></h4>
                    </header>
                    <?php if (!empty($item['content'])):?>
                        <div class="uk-comment-body">
                            <p><?php echo echoOutput($item['content']); ?></p>
                        </div>
                    <?php endif;?>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php if (empty($getReviews)):?>
    <p class="uk-text-center uk-text-muted uk-text-small"><?php echo _NOREVIEWSFOUND ?></p>
<?php endif;?>