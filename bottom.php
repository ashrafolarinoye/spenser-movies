<?php

$footerMenu = getFooterMenu($connect);

$idMenu = $footerMenu['menu_id'];

$navigationFooter = getNavigation($connect, $idMenu);

// Get Footer Ad

$footerAd = getFooterAd($connect);

require './views/bottom.view.php';

?>