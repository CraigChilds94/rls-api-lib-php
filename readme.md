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
```php
use RocketLeagueStats\Stats as Api;
use RocketLeagueStats\Data\Platform;

$api = new Api([
    'api_key' => 'your_api_key_here'
]);

$player = $api->player(Platform::PS4, 'PS4_UserNameHere');
```

##### Searching for a player on any platform
```php
use RocketLeagueStats\Stats as Api;

$api = new Api([
    'api_key' => 'your_api_key_here'
]);

$results = $api->search('UserNameHere')->toCollection();
```

##### Environment Variables

If you want you can supply the api key through an environment variable. Lets say, if you had [DotEnv](https://github.com/vlucas/phpdotenv) installed on your project you could add the entry to your `.env` file.

```
RLS_API_KEY="rls_api_key_here"
```

And then you will not need to pass it in the constructor of the `RocketLeagueStats\Stats` class. Here is an example batch player request without passing the api key:

````php
use RocketLeagueStats\Stats as Api;
use RocketLeagueStats\Data\Collection;

$api = new Api();

$players = new Collection([
    ['player' => 'UserName1', 'platform' => Platform::PS4],
    ['player' => 'UserName1', 'platform' => Platform::Steam],
]);

$allPlayers = $api->batch($players);
```

### Links
 * [Example](https://github.com/CraigChilds94/rls-api-lib-php/blob/master/example.php)
 * [API Documentation](http://documentation.rocketleaguestats.com/)
