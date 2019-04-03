<?php


namespace RunescapeTracker\RunescapePlayerApi;


use GuzzleHttp\Client;

abstract class Player
{

    /**
     * @var string Player Name
     */
    protected $playerName;

    /**
     * @var array
     */
    protected $player = [
        'skills'    =>  [],
        'activities'    =>  []
    ];

    /**
     * @var string Current endpoint
     */
    protected $endpoint;

    /**
     * @var array Series of endpoints related to a Runescape Player
     */
    protected $endpoints = [];

    /**
     * @var array Array of skills
     */
    protected $skillList = [];

    /**
     * @var array Array of activities
     */
    protected $activitiesList = [];

    public function __construct(string $playerName, string $endpoint)
    {

        $this->playerName = $playerName;

        $this->client = new Client([
            'http_errors'   =>  false
        ]);

        if(array_key_exists($endpoint, $this->endpoints))
            $this->endpoint = $endpoint;
    }

    /**
     * Make the API request to get the player
     */
    public function getHiscore(): self
    {
        $url = sprintf($this->endpoints[$this->endpoint], $this->playerName);

        $req = $this->client->get($url);

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

        return $this;
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

    /**
     * Get a skill by name
     *
     * @param $name
     * @return array|null
     */
    public function getSkill($name)
    {
        if(in_array(ucfirst($name), $this->skillList))
            return $this->player['skills'][ucfirst($name)];

        return null;
    }

    /**
     * Returns a players minigame activity ranking
     *
     * @param $name
     * @return array
     */
    public function getActivity($name): array
    {

        if(in_array(ucfirst($name), $this->activitiesList))
            return $this->player['activities'][ucfirst($name)];

        foreach ($this->activitiesList as $activity)
        {
            $tryMatch = strtolower($activity);
            $tryMatch2 = str_replace(".", "", $tryMatch);

            $lowercaseName = strtolower($name);

            if($tryMatch === $lowercaseName || $tryMatch2 === $lowercaseName)
                return $this->player['activities'][$activity];

        }

        return null;
    }

    /**
     * Return the skill list for the game
     *
     * @return array
     */
    public function getSkillList(): array {
        return $this->skillList;
    }

    /**
     * Return the activities list for the game
     *
     * @return array
     */
    public function getActivitiesList(): array {
        return $this->activitiesList;
    }

}