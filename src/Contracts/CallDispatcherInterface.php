<?php 

namespace RocketLeagueStats\Contracts;

/**
 * The interface for an api
 * call dispatcher.
 *
 * @author Craig Childs <childscraig17@gmail.com>
 */
interface CallDispatcherInterface
{
    /**
     * The method stub to handle the call dispatch
     * 
     * @param  string $method
     * @param  string $url
     * @param  array  $data
     * @return Response
     */
    public function handle($method, $url, $data);
}