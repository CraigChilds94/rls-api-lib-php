<?php

namespace spec\RocketLeagueStats;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StatsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('RocketLeagueStats\Stats');
    }

    function it_should_throw_401_without_key()
    {
        $this->shouldThrow('RocketLeagueStats\Exceptions\UnauthorizedException')->during('platforms');
    }

    function it_should_grab_platforms()
    {
        $this->beConstructedWith([
            'api_key' => 'valid_key_here'
        ]);

        $this->platforms()->shouldReturnAnInstanceOf('RocketLeagueStats\Http\ResponseData');
    }
}
