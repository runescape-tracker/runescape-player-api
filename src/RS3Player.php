<?php


namespace RunescapeTracker\RunescapePlayerApi;


use GuzzleHttp\Client;
use phpDocumentor\Reflection\Types\This;

class RS3Player extends Player
{

    /**
     * @var array Series of endpoints related to a Runescape Player
     */
    protected $endpoints = [
        'hiscore_regular' => 'https://secure.runescape.com/m=hiscore/index_lite.ws?player=%s',
        'hiscore_ironman' => 'https://secure.runescape.com/m=hiscore_oldschool_ironman/index_lite.ws?player=%s',
        'hiscore_hardcore_ironman'  =>  'https://secure.runescape.com/m=hiscore_hardcore_ironman/index_lite.ws?player=%s'
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

    public function __construct(string $playerName, string $endpoint = 'hiscore_regular')
    {
        parent::__construct($playerName, $endpoint);
    }

}