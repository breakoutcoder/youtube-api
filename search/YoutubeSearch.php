<?php

include '../api/YoutubeApi.php';
$youtubeApi = new YoutubeApi();

if ($_POST['search'] && $_POST['search'] != null) {
    
    $result = $youtubeApi->search($_POST['search']);
    $videoId = array();
    foreach($result->items as $item){
        $videoId[] = $item->id->videoId;
    }
    
    echo json_encode($videoId);

}