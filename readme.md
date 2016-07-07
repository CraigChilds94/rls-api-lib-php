# rls-api (PHP Implementation)

This is the un-official PHP client library for the RocketLeagueStats API.

### Installation
```
composer require craigchilds/rls-api
```

### Usage

Here are a few examples of how you can use the api to fetch different types of data.

##### Fetching a list of the playlists
```php
use RocketLeagueStats\Stats as Api;

$api = new Api([
    'api_key' => 'your_api_key_here'
]);

$playlists = $api->playlists()->toCollection();
```

##### Fetching a player by platform & name
```
use RocketLeagueStats\Stats as Api;
use RocketLeagueStats\Data\Platform;

$api = new Api([
    'api_key' => 'your_api_key_here'
]);

$player = $api->player(Platform::PS4, 'PS4_UserNameHere');
```

##### Searching for a player on any platform
```
use RocketLeagueStats\Stats as Api;

$api = new Api([
    'api_key' => 'your_api_key_here'
]);

$results = $api->search(Platform::PS4)->toCollection();
```

### Links
 * [Example](https://github.com/CraigChilds94/rls-api-lib-php/blob/master/example.php)
 * [API Documentation](http://documentation.rocketleaguestats.com/)
