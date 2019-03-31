<?php

include __DIR__ . "/../vendor/autoload.php";

$player = (new \RunescapeTracker\RunescapePlayerApi\RunescapePlayer("zezima"))->getHiscore();

var_dump(
    $player->getActivity("Bounty Hunter"),
    $player->getActivity("runescore"),
    $player->getActivity("bh rogues")
);

