<?php 

namespace RocketLeagueStats\Contracts;

/**
 * To be paired with the MakesRequests trait, this
 * defines the need to have a way to set a request
 * URL and headers for the requests as well
 * as a way to retrieve them.
 *
 * @author  Craig Childs <childscraig17@gmail.com>
 */
interface MakesRequestsContract
{   
    /**
     * A method stub for setting the request headers
     * 
     * @param array $headers
     */
    public function setHeaders($headers);

    /**
     * A method stub for retrieving the request headers.
     * 
     * @return array
     */
    public function getHeaders();

    /**
     * Method stub for setting the url
     * 
     * @param string $url
     */
    public function setRequestUrl($url);

    /**
     * Method stub for fetching the url
     *
     * @param  string $path Optional path to be appended
     * @return string
     */
    public function getRequestUrl($path = '');
}