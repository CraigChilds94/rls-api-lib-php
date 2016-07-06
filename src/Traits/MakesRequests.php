<?php

namespace RocketLeagueStats\Traits;

use RocketLeagueStats\Http\Request;
use RocketLeagueStats\Http\Response;
use RocketLeagueStats\Http\CallDispatcher;

/**
 * Classes which make use of this trait can make
 * requests to the API using the CallDispatcher.
 *
 * @author CraigChilds <childscraig17@gmail.com>
 */
trait MakesRequests
{   
    /**
     * Set the url for the request
     * 
     * @param string $url
     */
    public function setRequestUrl($url)
    {
        $this->requestUrl = $url;
    }

    /**
     * Make a request to a url, with a specific endpoint
     * and potentially some data.
     * 
     * @param  string $method
     * @param  string $endpoint
     * @param  array $data
     * @return Response
     */
    public function request($method, $endpoint, $data = [])
    {
        $dispatcher = new CallDispatcher(new Request(), new Response());
        return $dispatcher->handle($method, $this->requestUrl . $endpoint, $data);
    }  

    /**
     * Make a GET request to an endpoint
     * 
     * @param  string $endpoint
     * @param  array  $data
     * @return Response
     */
    public function get($endpoint, $data = []) 
    {
        return $this->request('GET', $endpoint, $data);
    }

    /**
     * Make a POST request to an endpoint
     * 
     * @param  string $endpoint
     * @param  array  $data
     * @return Response
     */
    public function post($endpoint, $data = []) 
    {
        return $this->request('POST', $endpoint, $data);
    }
}