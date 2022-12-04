<?php if(isWatch()): ?>
    <button class="uk-button uk-button-default uk-margin-medium-bottom" onclick="window.history.back();"><i class="uk-icon-angle-double-left"></i> <?php echo _GOBACK ?></button>
    <?php if(isLogged()): ?>

        <div class="uk-cover uk-margin-top">

                <?php if(isWatch() && !isEpisode()): ?>

                    <?php if(empty($itemDetails['iframe'])): ?>

                    <video id="player" playsinline controls>
                        <source src="<?php echo echoOutput($itemDetails['link']); ?>" />
                    </video>

                    <?php endif; ?>

                    <?php if(!empty($itemDetails['iframe'])): ?>
                        <?php echo $itemDetails['iframe']; ?>
                    <?php endif; ?>

                <?php if($itemDetails['movie_downloadable'] == 1): ?>
                        <a class="uk-button uk-button-primary uk-button-active uk-button-large uk-width-1-1 uk-margin-top" href="<?php echo echoOutput($itemDetails['link']); ?>" download><i class="uk-icon-download uk-margin-small-right"></i> <?php echo _DOWNLOAD; ?></a> 
                <?php endif; ?>

                <?php endif; ?>

                <?php if(isWatch() && isEpisode()): ?>

                    <?php if(empty($episodeDetails['episode_iframe'])){ ?>
                    <video id="player" playsinline controls>
                        <source src="<?php echo echoOutput($episodeDetails['episode_link']); ?>" />
                    </video>
                    <?php }else{ ?>
                        <?php echo $episodeDetails['episode_iframe']; ?>
                    <?php } ?>


                <?php if($episodeDetails['episode_downloadable'] == 1): ?>
                        <a class="uk-button uk-button-primary uk-button-active uk-button-large uk-width-1-1 uk-margin-top" href="//<?php echo echoOutput($episodeDetails['episode_link']); ?>" download><i class="uk-icon-download uk-margin-small-right"></i> Download</a> 
                <?php endif; ?>

                <?php endif; ?>

    <?php endif; ?>

    </div>

    <?php if (!isLogged()): ?>

        <div class="uk-margin-large-top">
            <a class="uk-text-muted" href="<?php echo $urlPath->signin(); ?>">
            <div class="uk-box-border">
                <?php echo _PLEASESIGNINTOWATCH ?>
                <i class="ion-ios-arrow-right uk-float-right"></i>
            </div>
        </a>
        </div>

    <?php endif; ?>

    <?php endif; ?>