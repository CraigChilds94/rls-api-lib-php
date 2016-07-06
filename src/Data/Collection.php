<?php 

namespace RocketLeagueStats\Data;

use JsonSerializable;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * A collection which can be converted
 * to a json string.
 */
class Collection extends ArrayCollection implements JsonSerializable
{   
    /**
     * Convert this collection to a json string
     * 
     * @return string
     */
    public function toJson()
    {
        return json_encode($this);
    }

    /**
     * Handle what we output this collection as
     * when we try to encode it as json.
     * 
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}