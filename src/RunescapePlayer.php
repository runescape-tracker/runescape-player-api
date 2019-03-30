<?php


namespace RunescapeTracker;


use GuzzleHttp\Client;

class RunescapePlayer
{

    /**
     * @var string Player Name
     */
    private $playerName;

    /**
     * @var array
     */
    private $player = [
        'skills'    =>  [],
        'activities'    =>  []
    ];

    /**
     * @var array Series of endpoints related to a Runescape Player
     */
    private $endpoints = [
        'hiscore_regular' => 'https://secure.runescape.com/m=hiscore/index_lite.ws?player=%s',
    ];

    private $skillList = [
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

    private $activitiesList = [
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

    /**
     * @var array Possible player types
     */
    private $possiblePlayerTypes = [
        'regular',
        'ironman',
        'hardcore_ironman',
    ];

    public function __construct($playerName = null)
    {
        if ($playerName) {
            $this->setPlayerName($playerName);
        }
    }

    /**
     * Set the player name
     *
     * @param string $playerName
     */
    public function setPlayerName(string $playerName): void
    {
        $this->playerName = $playerName;
    }

    /**
     * Make the API request to get the player
     */
    public function get(): void
    {
        $client = new Client();

        $url = sprintf($this->endpoints["hiscore_regular"], $this->playerName);

        $req = $client->get($url);

        if ($req->getStatusCode() === 200) {
            $contents = $req->getBody()->getContents();
            $contents = explode("\n", trim($contents));

            $combined = array_combine(array_merge($this->skillList, $this->activitiesList), $contents);

            $this->player['playername'] = $this->playerName;

            foreach($combined as $skill => $values)
            {
                $ex = explode(",", $values);

                if(count($ex) === 2)
                {
                    $this->player['activities'][$skill] = [
                        'ranking' => $ex[0],
                        'total' => $ex[1],
                    ];

                } else if(count($ex) === 3)
                {
                    $this->player['skills'][$skill] = [
                        'rank'    =>  $ex[0],
                        'level'    =>  $ex[1],
                        'experience'    =>  $ex[2],
                    ];
                }
            }
        }
    }

    /**
     * Get the player
     *
     * @return array
     */
    public function player(): array
    {
        return $this->player;
    }


}