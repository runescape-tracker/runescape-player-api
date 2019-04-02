<?php


namespace RunescapeTracker\RunescapePlayerApi;

class RS3Player extends Player
{


    const HISCORE_REGULAR = 'hiscore_regular';
    const HISCORE_IRONMAN = 'hiscore_ironman';
    const HISCORE_HARDCORE_IRONMAN = 'hiscore_hardcore_ironman';

    /**
     * @var array Series of endpoints related to a Runescape Player
     */
    protected $endpoints = [
        self::HISCORE_REGULAR => 'https://secure.runescape.com/m=hiscore/index_lite.ws?player=%s',
        self::HISCORE_IRONMAN => 'https://secure.runescape.com/m=hiscore_ironman/index_lite.ws?player=%s',
        self::HISCORE_HARDCORE_IRONMAN  =>  'https://secure.runescape.com/m=hiscore_hardcore_ironman/index_lite.ws?player=%s'
    ];

    protected $skillList = [
        "Overall",
        "Attack",
        "Defence",
        "Strength",
        "Constitution",
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
        "Summoning",
        "Dungeoneering",
        "Divination",
        "Invention",
    ];

    protected $activitiesList = [
        "Bounty Hunter",
        "B.H. Rogues",
        "Dominion Tower",
        "The Crucible",
        "Castle Wars games",
        "B.A. Attackers",
        "B.A. Defenders",
        "B.A. Collectors",
        "B.A. Healers",
        "Duel Tournament",
        "Mobilising Armies",
        "Conquest",
        "Fist of Guthix",
        "GG: Athletics",
        "GG: Resource Race",
        "WE2: Armadyl Lifetime Contribution",
        "WE2: Bandos Lifetime Contribution",
        "WE2: Armadyl PvP kills",
        "WE2: Bandos PvP kills",
        "Heist Guard Level",
        "Heist Robber Level",
        "CFP: 5 game average",
        "AF15: Cow Tipping",
        "AF15: Rats killed after the miniquest",
        "RuneScore",
        "Clue Scrolls Easy",
        "Clue Scrolls Medium",
        "Clue Scrolls Hard",
        "Clue Scrolls Elite",
        "Clue Scrolls Master",
    ];

    public function __construct(string $playerName, string $endpoint = self::HISCORE_REGULAR)
    {
        parent::__construct($playerName, $endpoint);
    }

}