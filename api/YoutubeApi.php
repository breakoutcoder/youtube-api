<?php

class YoutubeApi
{
    private $search = 'Gopal Bhar';
    private $api = "AIzaSyBdx4QMbwlHBdM8_DxvjXivZ32qzsXeGL0"; // YouTube Developer API Key

    public function Search($search = null)
    {
        if($search){
            $this->search = $search;
        }
        $link = "https://www.googleapis.com/youtube/v3/search?safeSearch=moderate&order=relevance&type=video&part=snippet&q=" . urlencode($this->search) . "&maxResults=10&key=" . $this->api;

        $video = file_get_contents($link);
        
        return json_decode($video);
    }
}
