<?php

include __DIR__ . "/../vendor/autoload.php";

$player = new \RunescapeTracker\RunescapePlayer();
$player->setPlayerName("zezima");
$player->get();

var_dump($player->player());

