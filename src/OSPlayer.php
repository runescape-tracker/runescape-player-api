<?php


namespace RunescapeTracker\RunescapePlayerApi;


use GuzzleHttp\Client;

class OSPlayer extends Player
{

    const HISCORE_REGULAR = 'hiscore_regular';
    const HISCORE_IRONMAN = 'hiscore_ironman';
    const HISCORE_HARDCORE_IRONMAN = 'hiscore_hardcore_ironman';
    const HISCORE_ULTIMATE_IRONMAN = 'hiscore_ultimate_ironman';
    const HISCORE_DEADMAN_IRONMAN = 'hiscore_deadman_ironman';
    const HISCORE_SEASONAL = 'hiscore_seasonal';
    const HISCORE_TOURNAMENT = 'hiscore_tournament';

    /**
     * @var array Series of endpoints related to a Runescape Player
     */
    protected $endpoints = [
        self::HISCORE_REGULAR => 'https://secure.runescape.com/m=hiscore_oldschool/index_lite.ws?player=%s',
        self::HISCORE_IRONMAN => 'https://secure.runescape.com/m=hiscore_oldschool_ironman/index_lite.ws?player=%s',
        self::HISCORE_HARDCORE_IRONMAN  =>  'https://secure.runescape.com/m=hiscore_oldschool_hardcore_ironman/index_lite.ws?player=%s',
        self::HISCORE_ULTIMATE_IRONMAN  =>  'https://secure.runescape.com/m=hiscore_oldschool_ultimate/index_lite.ws?player=%s',
        self::HISCORE_DEADMAN_IRONMAN  =>  'https://secure.runescape.com/m=hiscore_oldschool_deadman/index_lite.ws?player=%s',
        self::HISCORE_SEASONAL  =>  'https://secure.runescape.com/m=hiscore_oldschool_seasonal/index_lite.ws?player=%s',
        self::HISCORE_TOURNAMENT  =>  'https://secure.runescape.com/m=hiscore_oldschool_tournament/index_lite.ws?player=%s',
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