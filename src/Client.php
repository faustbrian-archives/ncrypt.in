<?php

/*
 * This file is part of nCrypt.in PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\nCrypt;

use BrianFaust\Http\Http;

class Client
{
    /**
     * @var string
     */
    public $authCode;

    /**
     * Create a new client instance.
     *
     * @param string $authCode
     */
    public function __construct(?string $authCode = null)
    {
        $this->authCode = $authCode;
    }

    /**
     * Create a new API service instance.
     *
     * @param string $name
     *
     * @return \BrianFaust\nCrypt\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $client = Http::withBaseUri('http://ncrypt.in/');

        $class = "BrianFaust\\nCrypt\\API\\{$name}";

        return new $class($client);
    }
}
