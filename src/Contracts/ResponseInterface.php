<?php 

namespace RocketLeagueStats\Contracts;

/**
 * This interface defines a response which
 * can be built, has a status code and
 * a body of data.
 *
 * @author  Craig Childs <childscraig17@gmail.com>
 */
interface ResponseInterface
{

    /**
     * Stub for building a response from
     * a code and a body.
     * 
     * @param  int   $code
     * @param  array $response
     * @return ResponseData
     */
    public function build($code, $response);

}