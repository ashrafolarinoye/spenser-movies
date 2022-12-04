<?php if(!isWatch()): ?>
 
 <div class="uk-margin-large-bottom" id="episodes">
   <h4 class="sectiontitle"><?php echo _EPISODES ?></h4>


   <?php foreach($serieEpisodes as $item): ?>

    <div class="uk-grid uk-flex-middle uk-grid-small uk-margin-remove episodes">
      <div class="uk-width-2-10 uk-width-small-2-10 uk-text-left">

        <div class="uk-overlay">
          <img src="<?php echo $urlPath->image($item['episode_image']); ?>" width="130px" >
          <div class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></div>
          <a class="uk-position-cover" href="<?php echo gotToWatchEpisode($item['episode_id']); ?>"></a>
        </div>

      </div>

      <div class="uk-width-7-10 uk-width-small-6-10 uk-text-left uk-flex-middle">
        <dl class="uk-description-list-line">
          <dt class="uk-text-contrast uk-margin-small-bottom"><?php echo echoOutput($item['episode_title']); ?></dt>
          <dd class="uk-text-truncate"><?php echo echoOutput($item['episode_description']); ?></dd>
        </dl>    
      </div>

      <div class="uk-width-1-10 uk-text-center">
        <div class="uk-button-group">
        <a class="uk-button uk-button-link uk-link-contrast" href="<?php echo gotToWatchEpisode($item['episode_id']); ?>"><i class="uk-icon-play uk-text-large"></i></a>
        <?php if($item['episode_downloadable'] == 1): ?>
        <a class="uk-button uk-button-link uk-link-contrast" href="<?php echo echoOutput($item['episode_link']); ?>" download><i class="uk-icon-download uk-text-large"></i></a>  
        <?php endif; ?>
        </div>
      </div>
    </div>
    <hr>

  <?php endforeach; ?>


  <?php if (empty($serieEpisodes)):?>
    <p class="uk-text-center uk-text-muted uk-text-small"><?php echo _NOEPISODESFOUND ?></p>
  <?php endif;?>

</div>

<?php endif; ?> 