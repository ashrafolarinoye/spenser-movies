    <div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">
        
        <div class="uk-grid">
            <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">

               <?php require 'sidebar.php'; ?>

           </div>

           <div id="tm-right-section" class="uk-width-large-8-10 uk-width-medium-7-10">

            <div class="uk-margin">
                <h1 class="uk-heading-small pagetitle"><?php echo _SEARCHRESULTSFOR ?> <span class="uk-text-muted uk-margin-small-left"><?php echo clearGetData(getParamsQuery()); ?></span></h1>
            </div>

            <form class="uk-form uk-width-1-1 uk-margin-large-bottom" action="<?php echo htmlspecialchars($urlPath->search()); ?>" method="get">

<div class="uk-grid" data-uk-grid="{gutter: 10, animation: false}">

<div class="uk-width-medium-9-10 uk-width-small-1-1">
    <input class="uk-input uk-width-1-1" type="search" name="query" value="<?php echo clearGetData(getParamsQuery()); ?>" autocomplete="off" required>
</div>

<div class="uk-width-medium-1-10 uk-width-small-1-1">
    <button class="uk-button uk-button-large uk-width-1-1" type="submit"><i class="uk-icon-search"></i></button>
</div>

</div>
                        
            </form>

                <?php if (!empty($qResults)):?>

            <div class="uk-grid">

                <?php foreach($qResults as $item): ?>

                    <div class="uk-width-1-3 uk-width-medium-1-3 uk-width-large-1-5 uk-margin-bottom">
                        <div class="uk-overlay uk-overlay-hover">
                            <img src="<?php echo $urlPath->image($item['image']); ?>" alt="Image">
                            <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background uk-overlay-icon"></div>
                            <?php if ($item['type'] == 'movie'):?>
                            <a class="uk-position-cover" href="<?php echo $urlPath->movie($item['id'], $item['slug']); ?>"></a>
                            <?php endif; ?>
                            <?php if ($item['type'] == 'serie'):?>
                            <a class="uk-position-cover" href="<?php echo $urlPath->serie($item['id'], $item['slug']); ?>"></a>
                            <?php endif; ?>

                        </div>
                        <div class="uk-panel">
                            
                            <h5 class="uk-panel-title uk-text-truncate"><?php echo echoOutput($item['title']); ?></h5>
                            <p>
                                <span class="uk-display-block uk-text-muted">
                                    <?php echo echoOutput($item['year']); ?>
                                </span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>


            <?php if (!empty($errors)):?>
                <?php echo $errors; ?>
            <?php endif; ?>

            <?php if (!empty($qResults)):?>
                <hr class="uk-margin-large-top">
                <span class="uk-text-muted"><?php echo _NUMBEROFRESULTS; ?> <?php echo $totalResults; ?></span>
            <?php endif; ?>

        </div>
    </div>
</div>