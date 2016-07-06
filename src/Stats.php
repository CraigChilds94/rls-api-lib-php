<?php 

namespace RocketLeagueStats;

use RocketLeagueStats\Api;

/**
 * The primary class for this api, it makes the 
 * requests to the specific endpoints and returns
 * the responses.
 *
 * @author  Craig Childs <childscraig17@gmail.com>
 */
class Stats extends Api
{
    /**
     * Get all of the supported platforms, for
     * this API and the game.
     * 
     * @return RocketLeagueStats\Data\Collection
     */
    public function platforms()
    {
        return $this->get('/data/platforms')->toCollection();
    }
}