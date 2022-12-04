
<?php 

$pageNum = getNumPage();

?>

<hr id="tm-divider">
<?php echo _PAGE . $pageNum." - ".$numPages; ?>


<?php if ($numPages > 0): ?>

    <div class="uk-margin-large-top uk-margin-bottom">
   <ul class="uk-pagination">

    <?php if ($pageNum > 1): ?>
    <li class="uk-disabled"><a href="<?php echo goToPage("p", $pageNum-1); ?>">
    <i class="uk-icon-angle-double-left"></i>
    </a>
    </li>
    <?php endif; ?>

    <?php if ($pageNum > 3): ?>
    <li><a href="<?php echo goToPage("p", "1"); ?>">1</a></li>
    <li><span>...</span></li>
    <?php endif; ?>


    <?php if ($pageNum-2 > 0): ?>
        <li class="page-item">
            <a href="<?php echo goToPage("p", $pageNum-2); ?>"><?php echo $pageNum-2 ?></a>
        </li>
    <?php endif; ?>

    <?php if ($pageNum-1 > 0): ?>
        <li class="page-item">
            <a href="<?php echo goToPage("p", $pageNum-1); ?>"><?php echo $pageNum-1 ?></a>
        </li>
    <?php endif; ?>


    <li class="uk-active"><span><?php echo $pageNum ?></span></li>

    <?php if ($pageNum+1 < $numPages+1): ?>
        <li class="page-item">
            <a href="<?php echo goToPage("p", $pageNum+1); ?>"><?php echo $pageNum+1 ?></a>
        </li>
    <?php endif; ?>
    
    <?php if ($pageNum+2 < $numPages+1): ?>
        <li class="page-item"><a href="<?php echo goToPage("p", $pageNum+2); ?>"><?php echo $pageNum+2 ?></a></li>
    <?php endif; ?>

    <?php if ($pageNum < $numPages-2): ?>
        <li><span>...</span></li>
        <li class="page-item"><a href="<?php echo goToPage("p", $numPages); ?>"><?php echo $numPages ?></a></li>
    <?php endif; ?>

    <?php if ($pageNum < $numPages): ?>
        <li class="uk-disabled">
        <a href="<?php echo goToPage("p", $pageNum+1); ?>">
            <i class="uk-icon-angle-double-right"></i></a>
        </li>
    <?php endif; ?>

</ul>
    </div>

    <?php endif; ?>

