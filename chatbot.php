<?php

$botToken = "601139420:AAF8bs4bZXiRLwE7N3OzXX8OqgkegvajbOw";
$website = "https://api.telegram.org/bot".botToken;

$update = file_get_contents($website."/getupdates");

print_r($update);
?>
