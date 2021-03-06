<?php 

namespace RocketLeagueStats\Http;

use RocketLeagueStats\Contracts\RequestInterface;
use RocketLeagueStats\Contracts\ResponseInterface;
use RocketLeagueStats\Contracts\CallDispatcherInterface;
use RocketLeagueStats\Exceptions\InvalidResponseException;

/**
 * Dispatches requests and builds usable response
 * objects from said request.
 *
 * @author  Craig Childs <childscraig17@gmail.com>
 */
class CallDispatcher implements CallDispatcherInterface
{
    protected $request;
    protected $response;

    public function __construct(RequestInterface $request, ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Handle making a request and returning
     * a built response.
     * 
     * @param  string $method
     * @param  string $url
     * @param  array $data
     * @return ResponseData
     */
    public function handle($method, $url, $data = [])
    {
        $response = $this->request->make($method, $url, $data);

        if (!$response) {
            throw new InvalidResponseException('The response was empty');
        }

        return $this->response->build($response['code'], $response['body']);
    }
}