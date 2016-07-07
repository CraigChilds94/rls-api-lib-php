<?php 

namespace RocketLeagueStats\Data;

/**
 * Represent a playlist
 *
 * @author  Craig Childs <childscraig17@gmail.com>
 */
class Playlist
{   
    const DUEL = 1;
    const DOUBLES = 2;
    const STANDARD = 3;
    const CHAOS = 4;
    const RANKED_DUEL = 10;
    const RANKED_DOUBLES = 11;
    const RANKED_SOLO_STANDARD = 12;
    const RANKED_STANDARD = 13;
    const SNOW_DAY = 15;
    const ROCKET_LABS = 16;

    /**
     * Is the provided playlist a ranked one?
     * 
     * @param  integer  $playlistId
     * @return boolean
     */
    public static function isRanked($playlistId)
    {
        return in_array($playlistId, [
            self::RANKED_DUEL,
            self::RANKED_DOUBLES,
            self::RANKED_SOLO_STANDARD,
            self::RANKED_STANDARD,
        ]);
    }
}