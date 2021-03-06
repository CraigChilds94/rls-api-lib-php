<?php 

namespace RocketLeagueStats\Http;

use RocketLeagueStats\Data\Collection;
use RocketLeagueStats\Exceptions\CannotCollectException;

/**
 * Represent a response's data
 * so that we can do stuff with it.
 *
 * @author Craig Childs <childscraig17@gmail.com>
 */
class ResponseData
{   
    /**
     * The response data body
     * 
     * @var array
     */
    protected $body;

    /**
     * The status code for the response
     * 
     * @var int
     */
    protected $code;

    /**
     * Construct a new object with some data
     *
     * @param int   $code
     * @param mixed $body
     */
    public function __construct($code, $body)
    {
        $this->code = $code;
        $this->body = $body;
    }

    /**
     * Convert this body data
     * to a collection.
     * 
     * @return Collection
     */
    public function toCollection()
    {
        if (!is_array($this->body)) {
            throw new CannotCollectException;
        }

        return new Collection($this->body);
    }

    /**
     * Get the data for this response
     * 
     * @return array
     */
    public function getData()
    {
        return $this->body;
    }

    /**
     * Get the response status code
     * 
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }
}