#!/usr/bin/php

<?php

$autolog = file_get_contents('autologin.txt');
//echo $autolog;


$monday = date('Y-m-d', strtotime('Monday this week'));
$sunday = date('Y-m-d', strtotime('Sunday this week'));
//echo $monday;
//echo $sunday;

$url = "https://intra.epitech.eu/$autolog/planning/load?format=json&start=$monday&end=$sunday";
//echo $url;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);

$data = json_decode($json);

$str = file_get_contents('config.json');
$model = json_decode($str);

var_dump($data);

for($i = 0; $i <= sizeof($data); $i++) 
{
    echo $data[$i][$model["SOMETHING"]];
    //echo ($elem[$model["SOMETHING"]]);
}
?>