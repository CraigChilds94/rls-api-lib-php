<?php 

namespace RocketLeagueStats\Exceptions;

use Exception;

/**
 * Represent an unauthorized response
 * exception so that the implementing client
 * can catch this if a request cannot be authed.
 *
 * @author Craig Childs <childscraig17@gmail.com>
 */
class UnauthorizedException extends Exception
{
    /**
     * Consruct the parent exception
     */
    public function __construct()
    {
        parent::__construct('Unable to authorize the api request, ensure your provided API key is correct.');
    }
}