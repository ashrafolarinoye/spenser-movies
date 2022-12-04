
<h4 class="sectiontitle"><?php echo _SHARETEXT; ?></h4>

<div class="uk-grid uk-grid-small share" data-uk-grid-margin>

<div class="uk-width-2-10">
<a class="uk-button uk-button-large uk-button-default uk-width-1-1" href="https://facebook.com/sharer/sharer.php?u=<?php echo(getFullUrl()); ?>" target="_blank" rel="noopener" aria-label=""><i class="uk-icon-facebook"></i> <span class="uk-hidden-small uk-hidden-medium uk-margin-left">Facebook</span></a>
</div>

<div class="uk-width-2-10">
<a class="uk-button uk-button-large uk-button-default uk-width-1-1" href="https://twitter.com/intent/tweet/?text=<?php echo $itemDetails['title']; ?>&amp;url=<?php echo(getFullUrl()); ?>" target="_blank" rel="noopener" aria-label=""><i class="uk-icon-twitter"></i> <span class="uk-hidden-small uk-hidden-medium uk-margin-left">Twitter</span></a>
</div>

<div class="uk-width-2-10">
<a class="uk-button uk-button-large uk-button-default uk-width-1-1" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=<?php echo $itemDetails['title']; ?>&amp;caption=<?php echo $itemDetails['title']; ?>&amp;content=<?php echo(getFullUrl()); ?>&amp;canonicalUrl=<?php echo(getFullUrl()); ?>&amp;shareSource=tumblr_share_button" target="_blank" rel="noopener" aria-label=""><i class="uk-icon-tumblr"></i> <span class="uk-hidden-small uk-hidden-medium uk-margin-left">Tumblr</span></a>
</div>

<div class="uk-width-2-10">
<a class="uk-button uk-button-large uk-button-default uk-width-1-1" href="whatsapp://send?text=<?php echo $itemDetails['title']; ?>%20<?php echo(getFullUrl()); ?>" target="_blank" rel="noopener" aria-label=""><i class="uk-icon-whatsapp"></i> <span class="uk-hidden-small uk-hidden-medium uk-margin-left">Whatsapp</span></a>
</div>

<div class="uk-width-2-10">
<a class="uk-button uk-button-large uk-button-default uk-width-1-1" href="https://reddit.com/submit/?url=<?php echo(getFullUrl()); ?>&amp;resubmit=true&amp;title=<?php echo $itemDetails['title']; ?>" target="_blank" rel="noopener" aria-label=""><i class="uk-icon-reddit-alien"></i> <span class="uk-hidden-small uk-hidden-medium uk-margin-left">Reddit</span></a>
</div>

</div>
