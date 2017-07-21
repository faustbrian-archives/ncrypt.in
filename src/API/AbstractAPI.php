<?php

/*
 * This file is part of nCrypt.in PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\nCrypt\API;

use BrianFaust\Http\HttpResponse;
use BrianFaust\Http\PendingHttpRequest;

abstract class AbstractAPI
{
    /**
     * @var \BrianFaust\Http\PendingHttpRequest
     */
    protected $client;

    /**
     * Create a new API class instance.
     *
     * @param \BrianFaust\Http\PendingHttpRequest $client
     */
    public function __construct(PendingHttpRequest $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $uri
     * @param array $parameters
     *
     * @return \BrianFaust\Http\HttpResponse
     */
    public function post(string $uri, array $parameters): HttpResponse
    {
        return $this->client->post("$uri?auth_code={$this->client->authCode}", $parameters);
    }
}
