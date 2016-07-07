<?php 

namespace RocketLeagueStats\Exceptions;

use Exception;

/**
 * Thrown when a provided playlist must be a ranked
 * playlist.
 *
 * @author Craig Childs <childscraig17@gmail.com>
 */
class PlaylistMustBeRankedException extends Exception
{
    /**
     * Consruct the parent exception
     */
    public function __construct()
    {
        parent::__construct('The provided playlist must be a ranked one.');
    }
}