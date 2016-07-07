<?php 

namespace RocketLeagueStats\Exceptions;

use Exception;

/**
 * Thrown when someone tries to convert a non-array
 * to a collection.
 * 
 * @author Craig Childs <childscraig17@gmail.com>
 */
class CannotCollectException extends Exception
{
    /**
     * Consruct the parent exception
     */
    public function __construct()
    {
        parent::__construct('Cannot convert entity to a collection');
    }
}