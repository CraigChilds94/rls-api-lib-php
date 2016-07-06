<?php 

// Create a new instance of the stats library with
// the required options.
$rls = new RocketLeagueStats\Stats([
    'api_key' => 'put_your_api_key_here'
]);

// Make a call to pull in the platforms
// GET /v1/data/platforms
$platforms = $rls->platforms();

// See RocketLeagueStats\Stats for more information
// on the api for this library.