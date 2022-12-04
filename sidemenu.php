<?php 


// Movies Genres

$moviesGenres = getMoviesGenres($connect);

// Series Genres

$seriesGenres = getSeriesGenres($connect);

require './views/sidemenu.view.php';

?>