<?php

namespace spec\RocketLeagueStats;

use Dotenv\Dotenv;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StatsSpec extends ObjectBehavior
{
    function let()
    {
        $dotenv = new Dotenv(__DIR__);
        $dotenv->load();
        $dotenv->required('RLS_API_KEY');
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
}
