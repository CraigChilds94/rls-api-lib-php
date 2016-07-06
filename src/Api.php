<?php 

namespace RocketLeagueStats;

use RocketLeagueStats\Traits\MakesRequests;

/**
 * Handle the base Api functionality, and
 * setup. This class configures our stats 
 * api class to have the necessary data to
 * make the requests.
 *
 * @author Craig Childs <childscraig17@gmail.com>
 */
class Api
{
    use MakesRequests;

    /**
     * The Api Key for this instance
     * of the Stats Api.
     * 
     * @var array
     */
    protected $apiKey;

    /**
     * The url for the Api
     * 
     * @var string
     */
    protected $apiUrl = 'https://api.rocketleaguestats.com/v1';

    /**
     * The options that were passed into
     * this instance of the Stats Api.
     * 
     * @var array
     */
    protected $options;

    /**
     * Construct the Stats object with provided options, 
     * or try to load them in from the ENV.
     * 
     * @param array $options
     */
    public function __construct($options = array())
    {
        $this->options = $this->extractOptions($options);

        $this->setRequestUrl($this->apiUrl);
    }

    /**
     * Extract options from the provided input, or
     * default to using ENV
     * 
     * @param  array $options
     * @return array
     */
    private function extractOptions($options)
    {
        $this->apiKey = $this->extractOptionKey('api_key', $options, $this->env('RLS_API_KEY'));

        return $options;
    }

    /**
     * Extract options from the option array by
     * key, and provide a fallback value.
     * 
     * @param  string $key
     * @param  array  $options
     * @param  mixed  $fallback Default to false
     * @return mixed
     */
    private function extractOptionKey($key, $options, $fallback = false)
    {
        return array_key_exists($key, $options) ? $options[$key] : $fallback;
    }

    /**
     * Get an environment variables value
     * or provide a fallback.
     * 
     * @param  string  $key
     * @param  boolean $fallback
     * @return mixed
     */
    private function env($key, $fallback = false)
    {
        $value = getenv($key);

        return $value ? $value : $fallback;
    }
}