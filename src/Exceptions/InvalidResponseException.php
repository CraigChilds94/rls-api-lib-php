<?php 

namespace RocketLeagueStats\Exceptions;

use Exception;

/**
 * Thrown when the response from the API is invalid.
 * 
 * @author Craig Childs <childscraig17@gmail.com>
 */
class InvalidResponseException extends Exception
{
    /**
     * Consruct the parent exception
     */
    public function __construct($message = false)
    {
        parent::__construct($message ? $message : 'The provided response was invalid');
    }
}