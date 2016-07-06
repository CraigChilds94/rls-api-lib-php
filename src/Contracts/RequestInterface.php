<?php 

namespace RocketLeagueStats\Contracts;

/**
 * An interface to define our request
 * object.
 *
 * @author  Craig Childs <childscraig17@gmail.com>
 */
interface RequestInterface
{

    /**
     * Method stub to make a request to a 
     * specified url with the method and
     * some data.
     * 
     * @param  strin  $method     
     * @param  string $url
     * @param  array  $data
     * @return array   
     */
    public function make($method, $url, $data);

}