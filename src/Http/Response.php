<?php 

namespace RocketLeagueStats\Http;

use RocketLeagueStats\Http\ResponseData;
use RocketLeagueStats\Contracts\ResponseInterface;

/**
 * Builds responses so that we can do stuff
 * with the data.
 *
 * @author  Craig Childs <childscraig17@gmail.com>
 */
class Response implements ResponseInterface
{
    /**
     * Build the response object
     *
     * @param  int   $code
     * @param  array $response
     * @return ResponseData
     */
    public function build($code, $response)
    {
        return new ResponseData($code, $response);
    }
}