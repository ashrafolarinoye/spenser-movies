

<div class="uk-container uk-container-center uk-margin-large-top uk-margin-large-bottom">

    <div class="uk-grid">

       <?php if ($itemDetails['page_layout'] == '1'): ?>

        <div id="tm-left-section" class="uk-width-medium-3-10 uk-width-large-2-10 uk-hidden-small">

           <?php require 'sidebar.php'; ?>

       </div>

   <?php endif; ?>


   <?php if ($itemDetails['page_layout'] == '1') { ?>
   
   <div class="uk-width-large-8-10 uk-width-medium-7-10">

    <?php } else { ?>

    <div class="uk-width-large">

        <?php } ?>

        <div class="uk-vertical-align-middle uk-width-1">
         <h1 class="uk-heading-small pagetitle"><?php echo echoOutput($itemDetails['page_title']); ?></h1>

         <div class="pagebody">
            <?php echo html_entity_decode($itemDetails['page_description']); ?>
        </div>

    </div>

</div>

</div>

</div>






