<?php 

namespace RocketLeagueStats;

use RocketLeagueStats\Api;
use RocketLeagueStats\Data\Platform;
use RocketLeagueStats\Data\Playlist;
use RocketLeagueStats\Data\Collection;
use RocketLeagueStats\Exceptions\PlaylistMustBeRankedException;

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
     * @return RocketLeagueStats\Http\ResponseData
     */
    public function platforms()
    {
        return $this->get('/data/platforms');
    }

    /**
     * Get the seasons
     * 
     * @return RocketLeagueStats\Http\ResponseData
     */
    public function seasons()
    {
        return $this->get('/data/seasons');
    }

    /**
     * Get the tiers
     * 
     * @return RocketLeagueStats\Http\ResponseData
     */
    public function tiers()
    {
        return $this->get('/data/tiers');
    }

    /**
     * Get the playlists
     * 
     * @return RocketLeagueStats\Http\ResponseData
     */
    public function playlists()
    {
        return $this->get('/data/playlists');
    }

    /**
     * Get a player by name and platform
     *
     * @param  int $platform
     * @return RocketLeagueStats\Http\ResponseData
     */
    public function player($platformId, $uniqueId)
    {
        $data = [
            'platform_id' => $platformId,
            'unique_id'   => $uniqueId
        ];

        return $this->get('/player', $data);
    }

    /**
     * Fetch a batch of players by their id's and
     * their platforms.
     * 
     * @param  RocketLeagueStats\Data\Collection $players
     * @return RocketLeagueStats\Http\ResponseData
     */
    public function batch(Collection $players)
    {
        $players = $this->mapPlayerCollectionKeys($players);
        return $this->post('/player/batch', $players->toArray());
    }

    /**
     * Search for a player with a displayName
     * 
     * @param  string  $displayName
     * @param  integer $page
     * @return RocketLeagueStats\Http\ResponseData
     */
    public function search($displayName, $page = 0)
    {
        return $this->get('/search/players', [
            'display_name' => $displayName,
            'page'         => $page
        ]);
    }

    /**
     * Grab top 100 ranked leaderboard for
     * a playlist.
     * 
     * @param  integer $playlistId
     * @return RocketLeagueStats\Http\ResponseData
     * @throws RocketLeagueStats\Exceptions\PlaylistMustBeRankedException
     */
    public function rankedLeaderboard($playlistId)
    {
        if (!Playlist::isRanked($playlistId)) {
            throw new PlaylistMustBeRankedException;
        }

        return $this->get('/leaderboard/ranked', [
            'playlist_id' => $playlistId,
        ]);
    }

    /**
     * Grab top 100 stats leaderboard for
     * a stat type.
     * 
     * @param  string $type
     * @return RocketLeagueStats\Http\ResponseData
     */
    public function statLeaderboard($type)
    {
        return $this->get('/leaderboard/stat', [
            'type' => $type,
        ]);
    }
}