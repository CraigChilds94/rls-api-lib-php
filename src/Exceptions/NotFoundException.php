<?php 

namespace RocketLeagueStats\Exceptions;

use Exception;

/**
 * Represent a request which was not found.
 * 
 * @author Craig Childs <childscraig17@gmail.com>
 */
class NotFoundException extends Exception
{
    /**
     * Consruct the parent exception
     */
    public function __construct()
    {
        parent::__construct('The requested endpoint could not be found.');
    }
}