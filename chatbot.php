<?php


$botToken = "601139420:AAF8bs4bZXiRLwE7N3OzXX8OqgkegvajbOw";
$website = "https://api.telegram.org/bot".botToken;

$update = file_get_contents($website."/getupdates");

$updateArray = json_decode($update, TRUE);

$chatId = $updateArray["result"][0]["message"]["chat"]["id"];	

file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=test");

?>
