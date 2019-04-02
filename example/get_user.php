<?php

include __DIR__ . "/../vendor/autoload.php";

$player = (new \RunescapeTracker\RunescapePlayerApi\RS3Player("null0r"))->getHiscore();

var_dump(
    $player->player(),
    $player->getActivity("runescore"),
    $player->getActivity("bh rogues")
);

$player = (new \RunescapeTracker\RunescapePlayerApi\OSPlayer("The Loner"))->getHiscore();

var_dump(
    $player->player()
);

$player = (new \RunescapeTracker\RunescapePlayerApi\RS3Player("Stanley", \RunescapeTracker\RunescapePlayerApi\RS3Player::HISCORE_IRONMAN));

var_dump(
    $player->player()
);