<?php

namespace spec\RocketLeagueStats;

use Dotenv\Dotenv;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use RocketLeagueStats\Data\Collection;
use RocketLeagueStats\Data\Playlist;
use RocketLeagueStats\Data\Platform;
use RocketLeagueStats\Data\StatType;

class StatsSpec extends ObjectBehavior
{
    function let()
    {
        try {
            $dotenv = new Dotenv(__DIR__);
            $dotenv->load();
        } catch(Exception $e) {}
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('RocketLeagueStats\Stats');
    }

    function it_should_throw_401_without_key()
    {
        $this->beConstructedWith([
            'api_key' => ''
        ]);

        $this->shouldThrow('RocketLeagueStats\Exceptions\UnauthorizedException')->during('platforms');
    }

    function it_should_grab_platforms()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $this->platforms()->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }

    function it_should_grab_seasons()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $this->seasons()->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }

    function it_should_grab_playlists()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $this->playlists()->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }

    function it_should_grab_tiers()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $this->tiers()->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }

    function it_should_grab_a_single_player()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $platform = Platform::PS4;
        $username = 'CragGrenade94';

        $this->player($platform, $username)->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }

    function it_should_grab_a_batch_of_players()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $players = new Collection([
            ['player' => 'CragGrenade94', 'platform' => Platform::PS4],
            ['player' => 'blue-ninja', 'platform' => Platform::PS4],
        ]);
        
        $this->batch($players)->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }

    function it_should_search_for_a_player()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $page = 0;
        $username = 'CragGrenade94';

        $this->search($username, $page)->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }

    function it_should_grab_top_100_ranked_leaderboard()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $playlist = Playlist::DOUBLES;
        $this->rankedLeaderboard($playlist)->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }

    function it_should_grab_top_100_stat_leaderboard()
    {
        $this->beConstructedWith([
            'api_key' => getenv('RLS_API_KEY')
        ]);

        $type = StatType::SHOTS;
        $this->statLeaderboard($type)->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }
}
