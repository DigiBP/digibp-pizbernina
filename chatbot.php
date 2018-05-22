// https://www.youtube.com/watch?v=hJBYojK7DO4

<?php

$botToken = "601139420:AAF8bs4bZXiRLwE7N3OzXX8OqgkegvajbOw";
$website = "https://api.telegram.org/bot".botToken;

$update = file_get_contents($website."/getupdates");

print_r($update);

//$updateArray = json_decode($update, TRUE);

//$text = $updateArray["result"][0]["message"]["text"]
//$chatId = $updateArray["result"][0]["chat"]["id"]	

//file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=test");

?>