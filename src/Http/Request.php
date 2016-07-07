<?php 

namespace RocketLeagueStats\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use RocketLeagueStats\Contracts\RequestInterface;
use RocketLeagueStats\Exceptions\NotFoundException;
use RocketLeagueStats\Exceptions\BadRequestException;
use RocketLeagueStats\Exceptions\UnauthorizedException;

/**
 * Makes requests to urls
 *
 * @author  Craig Childs <childscraig17@gmail.com>
 */
class Request implements RequestInterface
{   
    /**
     * The HTTP Client object
     * 
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new Guzzle client to
     * make our requests with. Set global
     * client wide headers.
     *
     * @param array $headers
     */
    public function __construct($headers = [])
    {
        $this->client = new Client(['headers' => $headers]);
    }

    /**
     * Make a request, or handle client errors
     * and throw exceptions
     * 
     * @param  string $method
     * @param  string $url
     * @param  array  $data
     * @return array
     * @throws NotFoundException
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    public function make($method = 'GET', $url, $data = [])
    {   
        try {
            $response = $this->client->request($method, $url, $data);
            
            return [
                'code' => (int) $response->getStatusCode(),
                'body' => json_decode($response->getBody())
            ];

        } catch (ClientException $e) {
            $code = $e->getResponse()->getStatusCode();

            if ($code == '400') {
                throw new BadRequestException;
            }

            if ($code == '401') {
                throw new UnauthorizedException;
            }

            if ($code == '404') {
                throw new NotFoundException;
            }
        }
    }
}