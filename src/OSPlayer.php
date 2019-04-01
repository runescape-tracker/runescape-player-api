<?php


namespace RunescapeTracker\RunescapePlayerApi;


use GuzzleHttp\Client;

class OSPlayer extends Player
{

    /**
     * @var array Series of endpoints related to a Runescape Player
     */
    protected $endpoints = [
        'hiscore_regular' => 'https://secure.runescape.com/m=hiscore_oldschool/index_lite.ws?player=%s',
        'hiscore_ironman' => 'https://secure.runescape.com/m=hiscore_oldschool_ironman/index_lite.ws?player=%s',
        'hiscore_hardcore_ironman'  =>  'https://secure.runescape.com/m=hiscore_oldschool_hardcore_ironman/index_lite.ws?player=%s',
        'hiscore_ultimate_ironman'  =>  'https://secure.runescape.com/m=hiscore_oldschool_ultimate/index_lite.ws?player=%s',
        'hiscore_deadman_ironman'  =>  'https://secure.runescape.com/m=hiscore_oldschool_deadman/index_lite.ws?player=%s',
        'hiscore_seasonal'  =>  'https://secure.runescape.com/m=hiscore_oldschool_seasonal/index_lite.ws?player=%s',
        'hiscore_tournament'  =>  'https://secure.runescape.com/m=hiscore_oldschool_tournament/index_lite.ws?player=%s',
    ];

    /**
     * @var array List of skills for old school Runescape
     */
    protected $skillList = [
        "Overall",
        "Attack",
        "Defence",
        "Strength",
        "Hitpoints",
        "Ranged",
        "Prayer",
        "Magic",
        "Cooking",
        "Woodcutting",
        "Fletching",
        "Fishing",
        "Firemaking",
        "Crafting",
        "Smithing",
        "Mining",
        "Herblore",
        "Agility",
        "Thieving",
        "Slayer",
        "Farming",
        "Runecrafting",
        "Hunter",
        "Construction",
    ];

    /**
     * @var array List of activities for old school Runescape
     */
    protected $activitiesList = [
        "Bounty Hunter - Hunter",
        "Bounty Hunter - Rogues",
        "Clue Scrolls All",
        "Clue Scrolls Easy",
        "Clue Scrolls Medium",
        "Clue Scrolls Hard",
        "Clue Scrolls Elite",
        "Clue Scrolls Master",
        "LMS Rank",
    ];

    public function __construct(string $playerName, string $endpoint = 'hiscore_regular')
    {
        parent::__construct($playerName, $endpoint);
    }

}