
<?php if ($footerAd): ?>
    <div class="uk-container uk-container-center">
        <div id="footerAd"><?php echo $footerAd; ?></div>
    </div>
<?php endif; ?>

<footer id="tm-footer" class="uk-block-secondary uk-block-small uk-padding-small">
    <div class="uk-container-center uk-container">
        <div class="uk-grid uk-inline uk-flex">
            <div class="uk-width-medium-5-10 uk-width-large-5-10 uk-flex uk-flex-left uk-flex-middle"><div class="copyright-text"><?= _COPYRIGHT ?></div></div>
            <div class="uk-width-medium-5-10 uk-width-large-5-10 uk-flex uk-flex-right uk-flex-middle uk-hidden-small">

                <ul class="uk-subnav">
                <?php foreach($navigationFooter as $nav): ?>
                    <?php if ($nav['navigation_type'] == 'custom') { ?>
                            <li><a href="//<?php echo $nav['navigation_url']; ?>" target="<?php echo $nav['navigation_target']; ?>"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo $urlPath->page($nav['navigation_url']); ?>" target="<?php echo $nav['navigation_target']; ?>"><?php echo echoOutput($nav['navigation_label']); ?></a></li>
                    <?php } ?>
                <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>
</footer>
