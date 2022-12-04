<?php



if (isEpisode()){

// Get Item Id

$idItem = clearGetData(getEpisodeId());

// Get Episode Details

$episodeDetails = getEpisodeById($connect, $idItem);

}

require './views/player.view.php';

?>