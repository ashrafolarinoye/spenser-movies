<?php if(!isWatch()): ?>
  <h4 class="sectiontitle"><?php echo _TRAILER ?></h4>
  <div class="uk-cover uk-margin-large-bottom">
    <div class="plyr__video-embed" id="player">
      <iframe
      src="https://www.youtube.com/embed/<?php echo $itemDetails['trailer']; ?>?modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
      allowfullscreen
      allowtransparency
      allow="autoplay"
      ></iframe>
    </div>
  </div>
<?php endif; ?>