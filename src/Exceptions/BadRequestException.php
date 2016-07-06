<?php 

namespace RocketLeagueStats\Exceptions;

use Exception;

/**
 * The request was not formatted as the
 * endpoint expected.
 * 
 * @author Craig Childs <childscraig17@gmail.com>
 */
class BadRequestException extends Exception
{
    /**
     * Consruct the parent exception
     */
    public function __construct()
    {
        parent::__construct('The requested endpoint could not process the request.');
    }
}