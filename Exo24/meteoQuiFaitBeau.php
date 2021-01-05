<?php
/*
Plugin Name: Ah qu'il faut beau ?
Description: Le plug qui te dit qu'il fait beau
Version: Pre early alpha v.0.0.0.0001
*/


 
function meteoQuiFaitBeau()
{
    $videoList = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=48800&lang=fr&appid=be404b077902406ef3e44391c78185fa"),true);
    print_r("Actuellement il fait ".$videoList["weather"][0]["description"]);

}
add_action("wp_footer", "meteoQuiFaitBeau");



